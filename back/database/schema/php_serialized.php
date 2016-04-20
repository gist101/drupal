<?php

// Explicit storage
// Better this way.
'settings' => array(
  'description' => t('Serialized settings data.'),
  'type' => 'text',
  'size' => 'big',
  'serialize' => TRUE,
  'object default' => array(),
);

// Hidden blob
$field['data'] = array(
  'description' => 'The serialized data.',
  'type' => 'blob',
  'size' => 'normal',
  'serialize' => TRUE,
  'not null' => FALSE,
);

// Also possible
// @todo Check if 'object default' implementation is a better solution
$field['data'] = array(
  'description' => 'The serialized data.',
  'type' => 'text',
  'size' => 'big',
  'serialize' => TRUE,
  'not null' => TRUE,
  'default' => 'a:0:{}',
);

