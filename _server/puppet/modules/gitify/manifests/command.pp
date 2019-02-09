/* this class handles the different commands of gitify */

class gitify::command(
  $command = ''
) {
  exec { "/vagrant/Gitify/Gitify ${command}":
    cwd         => "/www/",
    command     => "/vagrant/Gitify/Gitify ${command}",
    require     => Class['php'],
  }
}