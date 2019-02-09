#!/usr/bin/env bash

# tunneled parameters
MODX_CONTEXT_KEY=$1
HOST_NAME=$2

# TODO: pipe these as params from vagrant down!
DB_PASSWORD='vagrant'
DB_USER='vagrant'
DB_NAME='vagrant'
SRC_PATH='/vagrant/_server/bootstrap/extra/db/import'
SQL_PATH='/vagrant/_server/bootstrap/extra/db'

# disable standard login message from ubuntu
sudo touch ".hushlogin"

# copy custom profile settings
sudo cp /vagrant/_server/bootstrap/.bashrc /home/vagrant/
sudo cp /vagrant/_server/bootstrap/.profile /home/vagrant/

# TODO check how we can make a custom gitify action here

# TODO consider automatic adding of local vagrant user in modx
# TODO check if something is in the _data folder - if not, do not run Gitify

echo 'GITIFY: injecting modx instance data'
sudo chmod a+x /vagrant/_server/puppet/modules/gitify/files/build.sh
sudo /vagrant/_server/puppet/modules/gitify/files/build.sh '/vagrant' '/home/vagrant/Gitify/Gitify'

echo "Changing context settings..."
sudo php '/vagrant/_server/bootstrap/build.modx.objects.php'

# final autoremove of unused packages
sudo apt-get -y autoremove
