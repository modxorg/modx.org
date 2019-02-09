# ~/.profile: executed by the command interpreter for login shells.
# This file is not read by bash(1), if ~/.bash_profile or ~/.bash_login
# exists.
# see /usr/share/doc/bash/examples/startup-files for examples.
# the files are located in the bash-doc package.

# the default umask is set in /etc/profile; for setting the umask
# for ssh logins, install and configure the libpam-umask package.
#umask 022

# if running bash
if [ -n "$BASH_VERSION" ]; then
    # include .bashrc if it exists
    if [ -f "$HOME/.bashrc" ]; then
	. "$HOME/.bashrc"
    fi
fi

# set PATH so it includes user's private bin if it exists
if [ -d "$HOME/bin" ] ; then
    PATH="$HOME/bin:$PATH"
fi

RESET_ALL=`tput sgr0`

FG_RED=`tput setaf 1`
FG_GREEN=`tput setaf 2`
FG_YELLOW=`tput setaf 3`
FG_BLUE=`tput setaf 4`
FG_MAGENTA=`tput setaf 5`
FG_CYAN=`tput setaf 6`
FG_WHITE=`tput setaf 7`

BG_RED=`tput setab 1`
BG_GREEN=`tput setab 2`
BG_BLUE=`tput setab 4`
BG_WHITE=`tput setab 7`

UL=`tput smul`
RUL=`tput rmul`
BOLD=`tput bold`

echo "${FG_BLUE}${BOLD}"

echo ""
echo "  __  __  ___  ______  __ __     __                          _     ____             "
echo " |  \/  |/ _ \|  _ \ \/ / \ \   / /_ _  __ _ _ __ __ _ _ __ | |_  | __ )  _____  __ "
echo " | |\/| | | | | | | \  /   \ \ / / _\` |/ _\` | '__/ _\` | '_ \| __| |  _ \ / _ \ \/ / "
echo " | |  | | |_| | |_| /  \    \ V / (_| | (_| | | | (_| | | | | |_  | |_) | (_) >  <  "
echo " |_|  |_|\___/|____/_/\_\    \_/ \__,_|\__, |_|  \__,_|_| |_|\__| |____/ \___/_/\_\ "
echo "                                       |___/                                        "
echo "                                                   ...powered by SEDA.digital"

echo "${RESET_ALL}"

echo "${FG_CYAN}"
echo "You are now redirected to the vagrant synced folder (/vagrant)"
echo ""

cd /vagrant/

echo "${RESET_ALL}"
