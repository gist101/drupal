<?php

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
