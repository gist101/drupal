<?php

// @api http://drupal7.api/api/drupal/modules%21system%21system.api.php/function/hook_schema/7.x

$field = array(
  'description' => '',
  'type' => '',
);

function hook_schema() {
  $schema['node'] = array(

    // Example (partial) specification for table "node".
    'description' => 'The base table for nodes.',
    'fields' => array(
      'nid' => array(
        'description' => 'The primary identifier for a node.',
        'type' => 'serial',
        'unsigned' => TRUE,
        'not null' => TRUE,
      ),
      'vid' => array(
        'description' => 'The current {node_revision}.vid version identifier.',
        'type' => 'int',
        'unsigned' => TRUE,
        'not null' => TRUE,
        'default' => 0,
      ),
      'type' => array(
        'description' => 'The {node_type} of this node.',
        'type' => 'varchar',
        'length' => 32,
        'not null' => TRUE,
        'default' => '',
      ),
      'title' => array(
        'description' => 'The title of this node, always treated as non-markup plain text.',
        'type' => 'varchar',
        'length' => 255,
        'not null' => TRUE,
        'default' => '',
      ),
    ),
    'indexes' => array(
      'node_changed' => array('changed'),
      'node_created' => array('created'),
    ),
    'unique keys' => array(
      'nid_vid' => array('nid', 'vid'),
      'vid' => array('vid'),
    ),
    'foreign keys' => array(
      'node_revision' => array(
        'table' => 'node_revision',
        'columns' => array('vid' => 'vid'), // 'This Field' => 'That Field'
      ),
      'node_author' => array(
        'table' => 'users',
        'columns' => array('uid' => 'uid'),
      ),
    ),
    'primary key' => array('nid'),
  );
  return $schema;
}

// =============================================================================
// Data Types
// @doc Schema Data Type: https://www.drupal.org/node/159605

// -----------------------------------------------------------------------------
// int

// Primary serial
$field = array(
  'nid' => array(
    'description' => 'The primary identifier for a node.',
    'type' => 'serial',
    'unsigned' => TRUE,
    'not null' => TRUE,
  ),
);

$field['uid'] = array(
  'description' => "User's {users}.uid.",
  'type' => 'int',
  'not null' => TRUE,
  'default' => 0,
);

$field['deleted'] = array(
  'description' => 'A boolean indicating whether this item has been deleted.',
  'type' => 'int',
  'size' => 'tiny',
  'not null' => TRUE,
  'default' => 0,
);

// -----------------------------------------------------------------------------
// varchar

$field['title'] = array(
  'description' => 'The title of this node, always treated as non-markup plain text.',
  'type' => 'varchar',
  'length' => 255,
  'not null' => TRUE,
  'default' => '',
);

$field['url'] = array(
  'type' => 'varchar',
  // Maximum URLs length.
  'length' => 2048,
  'not null' => FALSE,
  'sortable' => TRUE,
);

// -----------------------------------------------------------------------------
// blob
// size: normal, big

$field['data'] = array(
  'description' => 'The serialized data.',
  'type' => 'blob',
  'size' => 'normal',
  'serialize' => TRUE,
  'not null' => FALSE,
);

$field['data'] = array(
  'description' => 'The serialized data.',
  'type' => 'text',
  'size' => 'big',
  'serialize' => TRUE,
  'not null' => TRUE,
  'default' => 'a:0:{}',
);

// -----------------------------------------------------------------------------
// text

$field['body'] = array(
  'description' => 'Body content',
  'type' => 'text',
  'size' => 'big',
  'not null' => FALSE,
);

