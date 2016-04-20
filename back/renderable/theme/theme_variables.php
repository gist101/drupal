<?php

// @see theme()
//   - $info
//   - $variables

// -----------------------------------------------------------------------------
// Template Default Variables

// @see template_preprocess().
// @doc http://drupal7.api/api/drupal/includes%21theme.inc/function/template_preprocess/7.x

$default_variables = array(
  'zebra' => 'odd', // 'even'
  'id' => '',
  'directory' => '',
  'classes_array' => array(),
);

// @see _template_preprocess_default_variables().
// @doc http://drupal7.api/api/drupal/includes%21theme.inc/function/_template_preprocess_default_variables/7.x

$default_variables = array(
  'attributes_array' => array(),
  'title_attributes_array' => array(),
  'content_attributes_array' => array(),
  'title_prefix' => array(),
  'title_suffix' => array(),
  'user' => $user,       //
  'is_admin' => FALSE,  //
  'logged_in' => FALSE, //
  'db_is_active' => !defined('MAINTENANCE_MODE'),
  'is_front' => FALSE,
);

// @see template_process().

$default_variables = array(
  'classes' => '',
  'attributes' => '',
  'title_attributes' => '',
  'content_attributes' => '',
);

// -----------------------------------------------------------------------------
// Function Variables

// @see theme().

// All '#[Name]' in 'variables' of theme registry will be automatically pop out.

// -----------------------------------------------------------------------------
// Function Variables

$common_variables = array(
  'theme_hook_suggestions' => array(),
  'zebra' => 'odd', // 'even'
);
