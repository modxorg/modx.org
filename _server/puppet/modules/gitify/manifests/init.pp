class gitify ()
  {

    exec { 'gitify-get':
      cwd     => '/home/vagrant/',
      /* command => "git clone https://github.com/modmore/Gitify.git Gitify", */
      command => "git clone https://github.com/modmore/Gitify.git Gitify -b content-or-condition",
      onlyif  => 'test ! -d /home/vagrant/Gitify',
      require => [ Package['git'] ]
    }

    /* Installation and basic setup of gitify */
    exec { 'gitify-dependencies':
      cwd         => '/home/vagrant/Gitify',
      environment => ["COMPOSER_HOME=/home/vagrant/Gitify"],
      command     => '/usr/local/bin/composer --no-interaction install',
      onlyif      => 'test ! -d vendor',
      require     => [ Exec['gitify-get'] ]
    }

    /* Mark the Gitify file as executable */
    exec { 'gitify-executable':
      command => 'sudo chmod +x /home/vagrant/Gitify/Gitify',
      onlyif  => 'test ! -f /home/vagrant/Gitify/Gitify',
      require => Exec['gitify-dependencies'],
    }

    /* link the executable in user local binary to make it available at cmd */
    exec { 'gitify-system-install':
      command => 'sudo ln -s /home/vagrant/Gitify/Gitify /usr/local/bin/Gitify',
      onlyif  => 'test ! -f /usr/local/bin/Gitify',
      require => Exec['gitify-executable'],
    }

    /* if there is no initialized project, do that */
    exec { 'gitify-init':
      cwd     => '/vagrant',
      command => 'sudo /home/vagrant/Gitify/Gitify init',
      onlyif  => 'test ! -f /vagrant/.gitify',
      require => Exec['gitify-executable'],
    }

  }
