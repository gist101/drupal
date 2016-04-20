<?php

// =============================================================================
// Define a new plugin type.

// @doc DRUPAL/help/ctools/plugins-creating, ctools/help/plugins-creating.html
// @doc http://ygerasimov.com/ctools-plugins-system

// hook_ctools_plugin_type().

// Minimum
$items['PLUGIN-TYPE'] = array();

// Help Document
$items['PLUGIN-TYPE'] = array(
  'cache' => FALSE,
  'cache table' => 'cache',
  'defaults' => array(),
  'load themes' => FALSE, // If theme could provide plugin.
  'hook' => 'MODULE_PLUGIN-TYPE',
  'process' => '', // callback(&$plugin, $info), one example is panelizer_entity_plugin_process().
  'extension' => 'inc',
  'info file' => FALSE,
  'use hooks' => TRUE, // It's said that it will be FALSE in later version.
  'child plugins' => FALSE,
);

// @see ctools_plugin_get_plugin_type_info().
$plugin_type_info_default = array(
  'module' => $module,
  'type' => $plugin_type_name,
  'cache' => FALSE,
  'cache table' => 'cache',
  'classes' => array(),
  'use hooks' => FALSE,
  'defaults' => array(),
  'process' => '',
  'alterable' => TRUE,
  'extension' => 'inc',
  'info file' => FALSE,
  'hook' => $module . '_' . $plugin_type_name,
  'load themes' => FALSE,
);

/**
 * Implements hook_ctools_plugin_type().
 */
function hook_ctools_plugin_type() {
  return array(
    'operation' => array(
      'use hooks' => TRUE,
    ),
  );
}

// =============================================================================
// Utility
// @api http://drupal7.api/api/ctools/7.x-1.x/search/ctools_plugin_get

ctools_include('plugins');

ctools_plugin_get_plugin_type_info($flush = FALSE);
ctools_plugin_get_directories($info);
ctools_get_plugins($module, $type, $id = NULL);


ctools_plugin_get_info($module, $type);
ctools_plugin_load_function($module, $type, $id, $function_name);
ctools_plugin_load_class($module, $type, $id, $class_name);


ctools_plugin_get_function($plugin_definition, $function_name);
ctools_plugin_get_class($plugin_definition, $class_name);

// -----------------------------------------------------------------------------
// Info

ctools_plugin_get_plugin_type_info($flush = FALSE);
ctools_plugin_get_info($module, $type);

// -----------------------------------------------------------------------------
// Provide Defaults

'defaults';

'process';

// $plugin
// $info is the plugin type info.
function MODULE_PLUGIN-TYPE_process(&$plugin, $info) {

}

// -----------------------------------------------------------------------------
// 'load themes'
// @see ctools_plugin_get_directories() plugins[MODULE][PLUGIN-TYPE] in .info
