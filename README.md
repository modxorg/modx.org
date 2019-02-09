# MODX.org

# Prerequisites

In order to use the dev environment the following software has to be installed on your host machine:

## Virtualbox

Virtualbox is the virtual machine tool and can be retrieved via [https://www.virtualbox.org/wiki/Downloads](https://www.virtualbox.org/wiki/Downloads).

## Vagrant

Vagrant is a remote wrapper for - in this case - Virtualbox which automates setting up machines with their network connections, parameters etc. It enables you to easily script a headless VM without using the Virtualbox GUI. It can be downloaded at [https://www.vagrantup.com/downloads.html](https://www.vagrantup.com/downloads.html).

# How to start

The VM bootstrapping procedure is started by typing `vagrant up` in the root project folder. During bootstrap a blank Ubuntu OS is configured with a LAMP stack, all needed software is installed from scratch, the project base SQL db is installed in the virtualized MySQL instance and the latest MODX data is injected via Gitify. In order to bootstrap an internet connection is needed, as all necessary installation files are downloaded freshly. *Note: the first time a vagrant up is done on a host, the base Ubuntu OS image is also downloaded (ca. 300MB). Any subsequent vagrant ups will then skip this step, as OS images are shared across the host*

The bootstrapping installation takes some time to finish. If anything fails during setup, you will see a text like "non-zero exit status" in your terminal. In this case it is likely that the VM setup failed and the virtualized MODX cannot be used.

You'll need to add the following line to your local `hosts` file:
```
192.168.60.38 local.modx.org
```

The project is accessible via `https://local.modx.org` afterwards (a SSL warning will be shown).

# Frontend development
Please read the [README](public/assets/templates/web/README.md)
