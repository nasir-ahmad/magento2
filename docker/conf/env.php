<?php
return array (
  'backend' =>
  array (
    'frontName' => 'admin_iec5pe',
  ),
  'crypt' =>
  array (
    'key' => 'd40e559ee8c535f1136a24203a0123c3',
  ),
  'db' =>
  array (
    'table_prefix' => getenv('MAGE_TABLE_PREFIX'),
    'connection' =>
    array (
      'default' =>
      array (
        'host' => getenv('MYSQL_HOST'),
        'dbname' => getenv('MYSQL_DATABASE'),
        'username' => getenv('MYSQL_USER'),
        'password' => getenv('MYSQL_PASSWORD'),
        'model' => 'mysql4',
        'engine' => 'innodb',
        'initStatements' => 'SET NAMES utf8;',
        'active' => '1',
      ),
    ),
  ),
  'resource' =>
  array (
    'default_setup' =>
    array (
      'connection' => 'default',
    ),
  ),
  'x-frame-options' => 'SAMEORIGIN',
  'MAGE_MODE' => 'default',
  'session' =>
  array (
    'save' => 'redis',
    'redis' =>
    array (
      'host' => getenv('REDIS_SESSION_HOST'),
      'port' => '6379',
      'password' => '',
      'timeout' => '2.5',
      'persistent_identifier' => '',
      'database' => '1',
      'compression_threshold' => '2048',
      'compression_library' => 'gzip',
      'log_level' => '1',
      'max_concurrency' => '6',
      'break_after_frontend' => '5',
      'break_after_adminhtml' => '30',
      'first_lifetime' => '600',
      'bot_first_lifetime' => '60',
      'bot_lifetime' => '7200',
      'disable_locking' => '0',
      'min_lifetime' => '60',
      'max_lifetime' => '2592000',
    ),
  ),
  'cache_types' =>
  array (
    'config' => 1,
    'layout' => 1,
    'block_html' => 1,
    'collections' => 1,
    'reflection' => 1,
    'db_ddl' => 1,
    'eav' => 1,
    'customer_notification' => 1,
    'config_integration' => 1,
    'config_integration_api' => 1,
    'full_page' => 1,
    'translate' => 1,
    'config_webservice' => 1,
  ),
  'install' =>
  array (
    'date' => 'Fri, 15 Dec 2017 15:00:00 +0000',
  ),
  'cache' =>
  array (
    'frontend' =>
    array (
      'default' =>
      array (
        'id_prefix' => getenv('CACHE_PREFIX'),
        'backend' => 'Cm_Cache_Backend_Redis',
        'backend_options' =>
        array (
          'server' => getenv('REDIS_CACHE_HOST'),
          'database' => '0',
          'port' => '6379',
        ),
      ),
      'page_cache' =>
      array (
        'id_prefix' => getenv('CACHE_PREFIX'),
        'backend' => 'Cm_Cache_Backend_Redis',
        'backend_options' =>
        array (
          'server' => getenv('REDIS_CACHE_HOST'),
          'port' => '6379',
          'database' => '1',
          'compress_data' => '0',
        ),
      ),
    ),
  ),
  'system' =>
  array (
    'default' =>
    array (
      'admin' =>
      array (
        'security' =>
        array (
          'password_is_forced' => '0',
        ),
      ),
    ),
  )
);
