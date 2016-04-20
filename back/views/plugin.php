<?php

// -----------------------------------------------------------------------------
// Hook

// @see hook_views_plugins().
// @see hook_views_plugins_alter(&$plugins).
// @see views_discover_plugins().
// @link http://drupal7.api/api/views/views.api.php/group/views_plugins/7.x-3.x
// @link http://drupal7.api/api/views/views.api.php/function/hook_views_plugins/7.x-3.x
// MODULENAME.views.inc

// For all kinds of plugins.
function hook_views_plugins() {
  $plugins = array();
  $plugins['PluginType']['all'] = array(
  	'title' => t(''),
    'handler' => '',
    'path' => '',
    'parent' => '',
    'no ui' => FALSE,
    'uses options' => FALSE,
    'help' => t(''),
    'help topic' => '',
    'theme' => '',
    'js' => array(),
    'type' => '',
  );

  return $plugins;
}

function hook_views_plugins_alter(&$plugins) {

}

// All plugins
$plugin = array(
  'title' => t(''),
  'handler' => '',
  'path' => drupal_get_path('module', 'ModuleName') . '/views/plugins',
  'parent' => '',
  'no ui' => FALSE,
  'uses options' => FALSE,
  'help' => t(''),
  'help topic' => '',
  'theme' => '',
  'js' => array(),
  'type' => '',
);

// Plugin: display
$plugin = array(
	'admin' => t(''),
  'no remove' => FALSE,
  'use ajax' => TRUE,
  'use pager' => TRUE,
  'use more' => FALSE,
  'accept attachments' => TRUE,
  'contextual links locations' => array(), // ???
  'uses hook menu' => FALSE,
  'uses hook block' => FALSE,
  'theme' => '',
  'js' => array(),
);

// Plugin: style
$plugin = array(
	'uses row plugin' => TRUE,
  'uses row class' => TRUE,
  'uses fields' => TRUE,
  'uses grouping' => TRUE,
  'even empty' => FALSE,
);

// Plugin: row
$plugin = array(
	'uses fields' => TRUE,
);
