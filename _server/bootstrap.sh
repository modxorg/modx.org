#!/usr/bin/env bash

GLOBAL_MODX_PRIVATE=${1}
GLOBAL_MODX_CONFIG_KEY=${2}

# this script ensures all data files for a proper puppet setup of the environment is available at provision time

# check if we may have an extracted database already in place.
# if not, we use the kickstart dump to automatically provision a basic modx instance
# before injecting the latest data with gitify.

if [ ! -f /vagrant/_backups/bootstrap.sql ]; then
    echo "No initial database found, copying kickstart bootstrap."

    # get the current kickstart db and copy it into the VM
    echo "Downloading latest kickstart db dump..."
    mkdir /tmp/modx_bootstrap
    cd /tmp/modx_bootstrap
    sudo wget -nv https://kickstart-build.seda.digital/download/kickstart-db-dump.sql

    cp kickstart-db-dump.sql /vagrant/_backups/bootstrap.sql

    cd & rm -rf /tmp/modx_bootstrap
fi

if [ ! -f ${GLOBAL_MODX_PRIVATE}/config/${GLOBAL_MODX_CONFIG_KEY}.inc.php ]; then
    echo "No modx configuration found."
    if [ -f /vagrant/_serverconfig/modx.inc.vagrant.php ]; then
        echo "Copying default file for vagrant from _serverconfig folder."
        cp /vagrant/_serverconfig/modx.inc.vagrant.php ${GLOBAL_MODX_PRIVATE}/config/${GLOBAL_MODX_CONFIG_KEY}.inc.php
    else
        echo "Copying default file for vagrant from _server folder."
        cp /vagrant/_server/bootstrap/modx.inc.vagrant.php ${GLOBAL_MODX_PRIVATE}/config/${GLOBAL_MODX_CONFIG_KEY}.inc.php
    fi

fi

# Install Nodejs with Ubuntu tools
#echo "++++++++++++++++++++ Installing NODE ++++++++++++++++++++"
#curl -sL https://deb.nodesource.com/setup_4.x | sudo -E bash -
#sudo apt-get -qqy update
#sudo apt-get -qqy install nodejs

sudo locale-gen de_DE
sudo locale-gen de_DE.UTF-8
sudo update-locale

# we extract the livereload port from the config and provide a simple ignored file for that
if [ -d /vagrant/public/assets/templates/web ]; then
    sudo echo ${3} > /vagrant/public/assets/templates/web/.livereload
else
    echo "No public/assets/templates/web folder was found. livereload file was not created."
fi

#####################################
# MAILHOG                           #
#####################################
cd /home/vagrant
if [ ! -d gocode ]; then
    mkdir gocode
fi
echo "export GOPATH=/home/vagrant/gocode" >> .profile
source .profile

sudo apt-get install -y golang-go

go get github.com/mailhog/MailHog
go get github.com/mailhog/mhsendmail

sudo ln -sf /home/vagrant/gocode/bin/MailHog /usr/local/bin/mailhog
sudo ln -sf /home/vagrant/gocode/bin/mhsendmail /usr/local/bin/mhsendmail

# make sure every possible php version is using the email stuff
SENTMAIL="sendmail_path = /usr/local/bin/mhsendmail"

sudo echo ${SENTMAIL} > /etc/php/7.0/cli/conf.d/30-mailhog.ini
sudo echo ${SENTMAIL} > /etc/php/7.1/cli/conf.d/30-mailhog.ini

sudo echo ${SENTMAIL} > /etc/php/7.0/apache2/conf.d/30-mailhog.ini
sudo echo ${SENTMAIL} > /etc/php/7.1/fpm/conf.d/30-mailhog.ini

# Install the stuff as service
IP=`ifconfig | grep -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep "192."`

sudo echo "[Unit]
Description=MailHog service

[Service]
ExecStart=/usr/local/bin/mailhog -api-bind-addr ${IP}:${4} -ui-bind-addr ${IP}:${4} -smtp-bind-addr 127.0.0.1:1025

[Install]
WantedBy=multi-user.target" > /etc/systemd/system/mailhog.service

echo "Starting service mailhog"
sudo service mailhog start
sudo systemctl daemon-reload
sudo systemctl | grep mailhog
