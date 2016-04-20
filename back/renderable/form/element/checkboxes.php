<?php

// ----------------------------------------------------------------------------
// Properties
// #type = 'checkboxes'
// #access
// #after_build
// #ajax
// #array_parents
// #attached
// #attributes
// #default_value
// #description
// #disabled
// #element_validate
// #options
// #parents
// #post_render
// #prefix
// #pre_render
// #process
// #required
// #states
// #suffix
// #theme
// #theme_wrappers
// #title
// #title_display
// #tree
// #value_callback
// #weight

// ----------------------------------------------------------------------------

$form['checkboxes'] = array(
  '#type' => 'checkboxes',
  '#options' => drupal_map_assoc(array(t('SAT'), t('ACT'))),
  '#title' => t('What standardized tests did you take?'),
);
