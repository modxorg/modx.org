<?php
$xpdo_meta_map['cbDefault']= array (
  'package' => 'contentblocks',
  'version' => '1.1',
  'table' => 'contentblocks_default',
  'fields' => 
  array (
    'constraint_field' => NULL,
    'constraint_value' => NULL,
    'default_template' => NULL,
    'target_layout' => NULL,
    'target_field' => NULL,
    'target_column' => NULL,
    'sortorder' => 0,
  ),
  'fieldMeta' => 
  array (
    'constraint_field' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
    ),
    'constraint_value' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
    ),
    'default_template' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
    ),
    'target_layout' => 
    array (
      'dbtype' => 'int',
      'precision' => '15',
      'phptype' => 'integer',
      'null' => false,
    ),
    'target_field' => 
    array (
      'dbtype' => 'int',
      'precision' => '15',
      'phptype' => 'integer',
      'null' => true,
    ),
    'target_column' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => true,
    ),
    'sortorder' => 
    array (
      'dbtype' => 'int',
      'precision' => '5',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
  ),
  'indexes' => 
  array (
    'sortorder' => 
    array (
      'alias' => 'sortorder',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'sortorder' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
