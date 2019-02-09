# About this folder

`_server` contains the SEDA.digital MODX Vagrant Box which is used for local development. It might be deployed to staging/production servers, while the domain root is always pointing at the `public` folder, so the vagrant box folder is not publically accessible.

## Contents
- bootstrap.sh: the shell script to install specific software for this modx vm during provision
- postinstall.sh: needed tasks to do after the provision has run
- puppet/: configuration files for the puppet provisioner to install the lamp stack
    - manifests/modx.pp: the puppet configuration file for automatic setup of software, e.g. databases
- bootstrap/: files needed for the bootstrapping process
