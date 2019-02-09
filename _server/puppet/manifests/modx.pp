node default {

  $doc_root = '/vagrant'
  $sys_packages = ['build-essential', 'curl', 'joe', 'git', 'unzip', 'postfix']
  $mysql_host = 'localhost'
  $mysql_db = 'vagrant'
  $mysql_user = 'vagrant'
  $mysql_pass = 'vagrant'
  $pma_port = 8000

  Exec { path => [ "/bin/", "/sbin/", "/usr/bin/", "/usr/sbin/" ] }
  exec { "apt-update":
    command => "/usr/bin/apt-get update"
  }

  class { 'apt':
    update => {
      frequency => 'weekly',
    },
  }
  package { ['python-software-properties']:
    ensure  => present,
    require => Exec['apt-update'],
  }
  package { $sys_packages :
    ensure  => "installed",
    require => Exec['apt-update'],
  }

  class { 'apache':
    default_vhost => false,
    default_mods  => false,
    mpm_module    => false,
    sendfile      => "Off",
    user          => 'vagrant',
    group         => 'vagrant'
  }

  class {
    'apache::mod::prefork':
      startservers    => 3,
      minspareservers => 2,
      maxspareservers => 5,
      maxclients      => 64,
  }

  include apache::mod::php

  apache::mod { 'rewrite': }
  apache::mod { 'expires': }
  apache::mod { 'headers': }
  apache::mod { 'setenvif': }
  apache::mod { 'access_compat': }
  apache::mod { 'proxy': }
  apache::mod { 'proxy_fcgi': }

  class {
    'apache::mod::ssl':
        ssl_mutex   => 'posixsem',   # needed to have apache restarted after vagrant halt + up
  }

  ::apache::vhost { $fqdn:
    servername      => $fqdn,
    docroot_owner   => 'vagrant',
    docroot_group   => 'vagrant',
    ssl             => false,
    default_vhost   => true,
    logroot         => $apache_log,
    directories     => [{
      path           => $modx_public,
      allow_override => ['All']
    }],
    docroot         => $modx_public,
    port            => 80,
    override        => 'all',
    custom_fragment => "ProxyPassMatch ^/(.*\\.php(/.*)?)$ fcgi://127.0.0.1:9000/${modx_public}/$1 retry=0",
  }

  ::apache::vhost { "ssl_${fqdn}":
      servername      => $fqdn,
      docroot_owner   => 'vagrant',
      docroot_group   => 'vagrant',
      ssl             => true,
      logroot         => $apache_log,
      directories     => [{
        path           => $modx_public,
        allow_override => ['All']
      }],
      docroot         => $modx_public,
      port            => 443,
      override        => 'all',
      custom_fragment => "ProxyPassMatch ^/(.*\\.php(/.*)?)$ fcgi://127.0.0.1:9000/${modx_public}/$1 retry=0",
    }

  notify {"Installing PHP version: ${php_version}": }
  class { '::php::globals':
    php_version => $php_version
  }

  class { '::php':
    fpm          => true,
    dev          => false,
    composer     => true,
    pear         => true,
    phpunit      => false,
    manage_repos => true,
    fpm_pools    => {},
    settings     => {
      'Date/date.timezone'      => 'Europe/Berlin',
      'PHP/upload_max_filesize' => '8M',
      'PHP/short_open_tag'      => '0',
      'PHP/log_errors'          => 'On',
      #'pcre.backtrack_limit = 2500000',
      'PHP/max_execution_time'  => '300',
      'PHP/max_input_time'      => '300',
      'memory_limit'            => '512M'
    },
    extensions   => {
      dom     => {},
      imagick => {},
      curl    => {},
      zip => {},
      mysql   => {
        "so_name" => 'mysqli' # this fixes missing so warnings: https://github.com/voxpupuli/puppet-php/issues/370
      },
      intl    => {},
    #  mcrypt  => {},    # comment out if PHP version is >= 7.2 (mcrypt is deprecated there and not available)
      gd      => {},
      mbstring => {}  # was not required for MODX 2.x (only for some extras), but needed for MODX3 setup
    },
    fpm_user     => 'vagrant',
    fpm_group    => 'vagrant',
  }
  php::fpm::pool { 'www':
     listen => '127.0.0.1:9000',
   }


  ##################################################################
  # Use nginx instead of apache (NOT IMPLEMENTED)
  ##################################################################

  #include nginx

  # nginx::resource::server { $fqdn:
  #   www_root  => '/www',
  #   autoindex => 'on',
  # }
  # nginx::resource::location { 'dontexportprivatedata':
  #   server        => $fqdn,
  #   location      => '~ /\.',
  #   location_deny => ['all'],
  # }
  # $users = ['vagrant']
  # $users.each |$user| {
  #   # create one fpm pool. will be owned by the specific user
  #   # fpm socket will be owned by the nginx user 'http'
  #   php::fpm::pool { $user:
  #     user         => $user,
  #     group        => $user,
  #     listen_owner => 'http',
  #     listen_group => 'http',
  #     listen_mode  => '0660',
  #     listen       => "/var/run/php-fpm/${user}-fpm.sock",
  #   }
  #   nginx::resource::location { "${name}_root":
  #     ensure      => 'present',
  #     server      => $fqdn,
  #     location    => "~ .*${user}\/.*\.php$",
  #     index_files => ['index.php'],
  #     fastcgi     => "unix:/var/run/php-fpm/${user}-fpm.sock",
  #     include     => ['fastcgi.conf'],
  #   }
  # }

  class { '::mysql::client':
    # package_name => 'mysql-client-5.7'
  }
  class { '::mysql::server':
    root_password           => 'vagrant',
    remove_default_accounts => true,
    restart                 => true,
    require                 => Exec['apt-update'],
    override_options        => {
      'mysqld'    => {
        /*'log_error' => '/vagrant/private/logs/mysql.error.log',*/
        'bind_address'                  => '0.0.0.0',

        #'slow_query_log'                => 1,
        #'slow_query_log_file'           => '/vagrant/private/logs/mysql.slowquery.log',
        'long_query_time'               => 3,

        'log_queries_not_using_indexes' => 1,

        'skip_name_resolve'             => 1,

        'max_connections'               => 64,
        'read_buffer_size'              => '8M', /* allocated per connection */
        'join_buffer_size'              => '8M', /* allocated per connection */
        'sort_buffer_size'              => '2M', /* allocated per connection */
        'key_buffer_size'               => '256M',
        'max_allowed_packet'            => '64M',
        'query_cache_limit'             => '512K',
        'query_cache_size'              => '64M',
        'thread_cache_size'             => 64,
        'thread_stack'                  => '16M',
        'sql_mode'                      => $sql_mode
      },
      'mysqldump' => {
        'max_allowed_packet' => '128M'
      }
    },
  }

  mysql::db { $mysql_db:
    user     => $mysql_user,
    password => $mysql_pass,
    host     => $mysql_host,
    grant    => ['ALL'],
    sql      => '/vagrant/_backups/bootstrap.sql'
  }

  ##################################################################
  # Grant host access to database:
  #   - db user root/<empty_pw> for all tables
  #   - db user vagrant/vagrant for tables vagrant.*
  ##################################################################
  mysql_user { "root@10.0.2.2":
    ensure             => 'present',
    password_hash => mysql_password( "" ),
  }
  mysql_grant { 'root@10.0.2.2/*.*':
    ensure     => 'present',
    privileges => ['ALL'],
    options    => ['GRANT'],
    table      => '*.*',
    user       => 'root@10.0.2.2',
  }
  mysql_user { "${mysql_user}@10.0.2.2":
    ensure             => 'present',
    password_hash => mysql_password( $mysql_pass),
  }
  mysql_grant { "${mysql_user}@10.0.2.2/vagrant.*":
    ensure     => 'present',
    privileges => ['ALL'],
    options    => ['GRANT'],
    table      => "${mysql_db}.*",
    user       => "${mysql_user}@10.0.2.2",
  }

  ##################################################################
  # Prepare gitify as a command
  ##################################################################
  class { 'gitify':
    require => [ Class['php'], Package['git'], Package['unzip'], Package['curl'] ]
  }

  exec { 'gitify-extract-executable':
    command => 'sudo chmod a+x /vagrant/extract.sh',
    onlyif  => 'test -f /vagrant/extract.sh',
    require => Exec['gitify-system-install'],
  }
}


