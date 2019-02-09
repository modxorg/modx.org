# Class: php::params
#
# This class defines default parameters used by the main module class gitify
# Operating Systems differences in names and paths are addressed here
#
# == Variables
#
# Refer to gitify class for the variables defined here.
#
# == Usage
#
# This class is not intended to be used directly.
# It may be imported or inherited by other classes
#
class gitify::params {

    $php_command = $::operatingsystem ? {
        /(?i:Ubuntu|Debian|Mint)/ => 'php5',
        /(?i:SLES|OpenSuSE)/      => [ 'php5','apache2-mod_php5'],
        default                   => 'php',
    }
}