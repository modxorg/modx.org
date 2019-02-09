#!/usr/bin/env bash

source /vagrant/_server/bootstrap/.colors

VTRIGGER=${1}
VMNAME=${2}

# interactivity must take place in Vagrantfile, as read from console does not work in remote scripts inside VM!

#echo
#echo -n "${FG_BLUE}Do want to backup your MODX database now? [Y,n] ";
#read backupConfirm
#echo "${RESET_ALL}"

#if [[ ("${backupConfirm}" == "y") || ("${backupConfirm}" == "") ]]; then
    # TIMESTAMP=$(date +%s)
    TIMESTAMP=$(date +%Y%m%d_%H-%M)

    FILENAME=/vagrant/_backups/${HOSTNAME}_${VMNAME}_${VTRIGGER}_${TIMESTAMP}.sql.gz

    echo "${FG_YELLOW}*** Backing up database ***${RESET_ALL}"
    export MYSQL_PWD=vagrant
    mysqldump -q -u vagrant --databases vagrant  | gzip -9 > ${FILENAME}

    if [ $? -eq 0 ]; then
        echo "${FG_GREEN}==> DB dump written to ${BG_GREEN}${FG_WHITE}${FILENAME}${RESET_ALL}"
        echo
        echo "If the backup marks a valid state of your development, you may gunzip (!) and copy it to the bootstrap.sql file to enable it for subsequent installations/provisions. Backups are not in git, but the bootstrap.sql is!"
        # TODO: ask for using the backup as new bootstrap!
    else
        echo "${BG_RED}${FG_BLACK}### No dump written due to error (${?}) ###${RESET_ALL}"
    fi

#else
#    echo "${FG_YELLOW}==> no backup."
#fi

echo "${RESET_ALL}"
