<?php

// @see node_view().
// @see template_preprocess_node().

$variables = array(
  'node' => NULL,
  'view_mode' => '',
  'page' => FALSE,
);

node_is_page($node);

function kalatheme_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}
