<?php
$xpdo_meta_map['cbCategory']= array (
  'package' => 'contentblocks',
  'version' => '1.1',
  'table' => 'contentblocks_category',
  'fields' => 
  array (
    'name' => NULL,
    'description' => NULL,
    'sortorder' => 0,
  ),
  'fieldMeta' => 
  array (
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '190',
      'phptype' => 'string',
      'null' => false,
    ),
    'description' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '1024',
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
    'name' => 
    array (
      'alias' => 'name',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'name' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
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
  'aggregates' => 
  array (
    'Fields' => 
    array (
      'class' => 'cbField',
      'local' => 'id',
      'foreign' => 'category',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
    'Layouts' => 
    array (
      'class' => 'cbLayout',
      'local' => 'id',
      'foreign' => 'category',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
    'Templates' => 
    array (
      'class' => 'cbTemplate',
      'local' => 'id',
      'foreign' => 'category',
      'cardinality' => 'one',
      'owner' => 'local',
    ),
  ),
);
