<?php

// @see drupal_pre_render_markup().

$elements['#children'] = $elements['#markup'];


// Special direct output element

// The '#type' can be ignore and will be auto filled.
$element = array(
  '#markup' => '',
);

$element = array(
  '#type' => 'markup',
  '#markup' => '',
);
