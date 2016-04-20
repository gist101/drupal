<?php

// @see theme_dropdown().

$variables = array(
  'id' => NULL, // Set a custom id if needed, or it would automatically generate one. For 'data-dropdown' and content html id.
  'trigger' => NULL, // @required The trigger <a>.
  'options' => array(), // Array to generate data-options attribute value
  'attributes' => array(), // For trigger <a>
  'type' => 'content', // 'links', 'content', 'custom'
  'content' => NULL,
  'content_attributes' => array(), // Not for 'custom'
);

// While it support some simple types, use 'custom' for full custom input.

// Dropdown Links
$vars = array(
  'trigger' => 'Click here',
  'type' => 'links',
  'content' => menu_navigation_links('main-menu'),
);
$output = theme('dropdown', $vars);
dsm($output);
