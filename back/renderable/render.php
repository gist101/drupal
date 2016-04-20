<?php

// @doc http://drupal7.api/api/drupal/modules%21system%21theme.api.php/group/themeable/7.x

// =============================================================================
// Workflow

// 1. Element Info
// 2. Theme Registry
// 3. Drupal Render

// -----------------------------------------------------------------------------
// Element Info
// Define the element type, and its default properties.
// Match the same element type and fill the default properties.

hook_element_info();
hook_element_info_alter(&$types);

$element = array(
  '#type' => 'ELEMENT',
  '#pre_render' => array(), // To whole element
  '#theme' => '', // Set it means it's used to theme whole element, not set means children will be themed individually.
  '#theme_wrappers' => array(),
  '#post_render' => array(), // To children and whole element
  '#states' => array(), // drupal_process_attached()
  '#attached' => array(), // drupal_process_attached()
  '#prefix' => '', // Prefix to #children
  '#suffix' => '', // Suffix to #children
);

// -----------------------------------------------------------------------------
// Theme Registry




// =============================================================================
// Utility

// Render means pass to theme() for output.

// Use render() in template to assure it will be print.

render(&$element); // show() and drupal_render().

drupal_render(&$elements);

// Useful to avoid render loop if theme function render some parts in other way and need to render the rest.
drupal_render_children(&$element, $children_keys = NULL);


drupal_get_form($form_id);

drupal_json_output($var);
