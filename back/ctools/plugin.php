<?php

// -----------------------------------------------------------------------------
// Base Usage

ctools_get_plugins($module, $type, $id = NULL);
ctools_plugin_load_function($module, $type, $id, $function_name);
ctools_plugin_load_class($module, $type, $id, $class_name);


// -----------------------------------------------------------------------------
// Plugin types

ctools_include('plugins');
dsm(ctools_plugin_get_plugin_type_info());


// -----------------------------------------------------------------------------
// Plugins

ctools_include('context');
dsm(ctools_get_arguments());

ctools_include('context');
dsm(ctools_get_contexts());

ctools_include('context');
dsm(ctools_get_relationships());


// -----------------------------------------------------------------------------
// Implements plugin

/**
 * Implements hook_ctools_plugin_directory().
 */
function hook_ctools_plugin_directory($owner, $plugin_type) {
  return $owner . '/' . $plugin_type;
}

// This directory structure is prefered.

/**
 * Implements hook_ctools_plugin_directory().
 */
function hook_ctools_plugin_directory($owner, $plugin_type) {
  $owners = array('ctools', 'panels');
  if (in_array($owner, $owners)) {
    return 'plugins/' . $owner . '/' . $plugin_type;
  }
}

function eck_extras_ctools_plugin_directory($owner, $plugin_type) {
  $owners = array('ctools');
  $plugin_types = array('content_types');
  if (in_array($owner, $owners) && in_array($plugin_type, $plugin_types)) {
    return $owner . '/' . $plugin_type;
  }
}

function hook_ctools_plugin_directory($owner, $plugin_type) {
  if ($owner == 'ctools') {
    return $owner . '/' . $plugin_type;
  }
}

function eck_name_ctools_plugin_directory($owner, $plugin_type) {
  if ($owner == 'eck' && $plugin_type == 'property_behavior') {
    return $owner . '/' . $plugin_type;
  }
}

function eck_extras_ctools_plugin_directory($owner, $plugin_type) {
  if (in_array($owner, array('ctools', 'eck')) && array('arguments', 'property_behavior')) {
    return $owner . '/' . $plugin_type;
  }
}


// -----------------------------------------------------------------------------
// Get the include files and pass through

$module = 'ctools';
$type = 'plugin-type';
dsm(file_scan_directory(drupal_get_path('module', $module) . '/includes', '/\.' . $type . '\.inc$/', array('key' => 'name')));

// -----------------------------------------------------------------------------
//

ctools_include('plugins');
ctools_get_plugins($module, $type, $id = NULL);
ctools_plugin_load_function($module, $type, $id, $function_name);
ctools_plugin_load_class($module, $type, $id, $class_name);

// -----------------------------------------------------------------------------
// Plugin Data
// @doc DRUPAL/help/ctools/plugins-creating

ctools_include('plugins');
ctools_get_plugins($module, $type, $id = NULL);

// Guaranteed data
$plugin = array(
  'name',
  'module',
  'file',
  'path',
  'plugin module',
  'plugin type',
);

// -----------------------------------------------------------------------------
// Callback

ctools_plugin_get_function($plugin, $callback_name);
ctools_plugin_load_function($module, $type, $id, $callback_name);

// Custom callback
$plugin = array(
  'name' => 'my_plugin',
  'module' => 'my_module',
  'callback_string' => 'MODULE_PLUGIN-TYPE_PLUGIN_callback',
  'callback_array' => array(
    'file' => 'my_plugin.extrafile.inc',
    'function' => 'my_module_my_plugin_example_callback',
  ),
);
