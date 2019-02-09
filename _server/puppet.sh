#!/usr/bin/env bash

# This script installs our needed puppet files
# install puppet files

MODULES=/vagrant/_server/puppet/modules

# the force flag does not install dependencies, therefore we have to
# explicitly name them here.
puppet module install puppetlabs-apt --target-dir=${MODULES} --force
puppet module install puppetlabs-stdlib --target-dir=${MODULES} --force
puppet module install puppet-archive --target-dir=${MODULES} --force --version '^2.3.0'
puppet module install puppetlabs-concat --target-dir=${MODULES} --force --version '^1.1.0'
puppet module install puppetlabs-inifile --target-dir=${MODULES} --force --version '^2.3.0'
puppet module install puppet-staging --target-dir=${MODULES} --force --version '^3.2.0'
puppet module install puppetlabs-translate --target-dir=${MODULES} --force --version '^1.1.0'
puppet module install puppet-zypprepo --target-dir=${MODULES} --force --version '^2.2.1'

# now actually provision the server services to our box

puppet module install puppet-php --target-dir=${MODULES} --force --version '^6.0.2'
puppet module install puppetlabs-mysql --target-dir=${MODULES} --force --version '^6.2.0'
puppet module install puppetlabs-apache --target-dir=${MODULES} --force --version '^3.4.0'
