<?php

// -----------------------------------------------------------------------------
// Hook

// @see hook_views_api().
// @link http://drupal7.api:8082/api/views/views.api.php/function/hook_views_api/7.x-3.x

// @see hook_views_default_views().

// hook_views_data_alter() seems only work in MODULE.views.inc after hook_views_api() specify the 'path'.

// -----------------------------------------------------------------------------
// Implementation
// /views, /views/handlers, /views/plugins.

/**
 * Implements hook_views_api().
 */
function hook_views_api() {
  return array(
    'api' => 3,
  );
}

/**
 * Implements hook_views_api().
 */
function hook_views_api() {
  return array(
    'api' => 3,
    'path' => drupal_get_path('module', 'ModuleName') . '/views',
  );
}

/**
 * Implements hook_views_api().
 */
function hook_views_api() {
  return array(
    'api' => 3,
    'path' => drupal_get_path('module', 'ModuleName') . '/views',
    'template path' => drupal_get_path('module', 'ModuleName') . '/templates',
  );
}
