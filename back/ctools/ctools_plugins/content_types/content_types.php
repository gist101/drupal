<?php

// http://local.mt4db.com/help/ctools/context-content

// -----------------------------------------------------------------------------
// $plugin
// @see ctools_content_process().

// Auto find 'assumed' callback function 
$function_base = $plugin['module'] . '_' . $plugin['name'] . '_content_type_';

// Simplest
$plugin = array(
  'title' => t(''),
  'description' => t(''),
  'category' => '',
);

// Common
$plugin = array(
  'title' => t(''),
  'description' => t(''),
  'category' => '',
  'top level' => FALSE,
  'icon' => 'no-icon.png',
  'required context' => new ctools_context_required(t(''), ''),
	'render callback' => $function_base . 'render',
  'admin title' => $function_base . 'admin_title', // Default is 'title'
  'admin info' => $function_base . 'admin_info',
  'edit form' => array($function_base . 'edit_form'), // Can add more than one, Multiple Pages?
  'add form' => array($function_base . 'add_form' => t('')),       // Default is 'edit form'
  'content types' => $function_base . 'content_types',
  'single' => TRUE,
);

// -----------------------------------------------------------------------------
// Simplest implmentation

$plugin = array(
  'title' => t('Simplest content types'),
);

function MODULE_PLUGIN_content_type_render($subtype, $conf, $args, $pane_context, $incoming_content) {
  $block = new stdClass();
  $block->title = '';
  $block->content = '';

  return $block;
}

// -----------------------------------------------------------------------------
// $plugin all available properties

$plugin = array(
  'title' => t(''),
  'no title override' => TRUE,
  'description' => t(''),
  'category' => '',
  'top level' => FALSE,
  'icon' => 'no-icon.png',
  'js' => array('misc/autocomplete.js', 'misc/textarea.js', 'misc/collapse.js'),
  // Context
  'required context' => new ctools_context_required(t('')),
  'all contexts' => FALSE, // Set to TRUE to bring all context within $pane_context. @see fieldable_panels_panes_fieldable_panels_pane_ctools_content_types()
  'render callback' => $function_base . 'render',
  'admin title' => $function_base . 'admin_title', // Default is 'title'
  'admin info' => $function_base . 'admin_info',
  'edit form' => array($function_base . 'edit_form'),
  'add form' => $function_base . 'add_form',       // Default is 'edit form'
  'defaults' => array(), // Default $conf variables value
  'content types' => $function_base . 'content_types', // @see ctools_content_get_subtypes(), it can be array() or function
  'content type' => '', // @see ctools_content_get_subtype()
  'single' => TRUE, // Force Single content type
);

// -----------------
// 'render callback'
// @see ctools_content_render().

// Debug: info
function debug_info_content_type_render($subtype, $conf, $args, $pane_context, $incoming_content) {

  // @debug
  dpm($subtype, 'subtype');
  dpm($conf, 'conf');
  dpm($args, 'args');
  dpm($pane_context, 'pane_context');
  dpm($incoming_content, 'incoming_content');

  //
  $block = new stdClass();
  $block->title = t('');
  $block->content = '';
  
  return FALSE;
}

// Block data structure
function block_content_type_render($subtype, $conf, $args, $pane_context) {

  // Simplest
  $block = new stdClass();
  $block->title = t('');
  $block->content = '';
  
  /*
  $block = new stdClass();
  $block->module  = 'MODULE';
  $block->title = t('');
  $block->title_link = array();
  $block->content = '';
  $block->delta = '';
  */
  
  // title
  // content
  // links
  // more
  // admin_links
  // feeds
  // type
  // subtype
  
  return $block;
}

// -----------------------------------------------------------------------------
// 'required context' new ctools_context_required()
//
// $args
// 1. title
// end. Array restrictions
// end. Boolean skip_name_check
// middle. String|Array keywords



// =============================================================================
// Hooks

hook_ctools_content_subtype_alter(&$subtype, &$plugin);

