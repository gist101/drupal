<?php


// ============================================================================
//
/*
hook_menu()
hook_menu_alter(&$items)
hook_menu_link_alter(&$item)
hook_translated_menu_link_alter(&$item, $map)
hook_menu_link_insert($link)
hook_menu_link_update($link)
hook_menu_link_delete($link)
hook_menu_local_tasks_alter(&$data, $router_item, $root_path)
hook_menu_breadcrumb_alter(&$active_trail, $item)
hook_menu_contextual_links_alter(&$links, $router_item, $root_path)
*/

// -----------------------------------------------------------------------------
// Pay attention to *_load() function.

// Will call bar_load().
$items['foo/%bar'] = array();

// ----------------------------------------------------------------------------
// Load any entity object
// @see entity_object_load().

$items['myentity/%entity_object'] = array();


// ============================================================================
// hook_menu()
// @link https://api.drupal.org/api/drupal/modules%21system%21system.api.php/function/hook_menu/7

$menu_items['PATH'] = array(
  'title' => '',
  'title callback' => 't',
  'description' => '',
  'page callback' => '',
  'page arguments' => array(),
  'delivery callback' => 'drupal_deliver_html_page',
  'access callback' => 'user_access',
  'access arguments' => array(),
  'theme callback' => '',
  'theme arguments' => array(),
  'file' => '',
  'file path' => '',
  'load arguments' => array(),
  'weight' => 0,
  'menu_name' => 'navigation',
  'expanded' => FALSE,
  'context' => MENU_CONTEXT_PAGE,
  'tab_parent' => '',
  'tab_root' => '',
  'position' => '', // ???
  'type' => MENU_NORMAL_ITEM,
  'options' => array(), // l()
);

// 'type'
MENU_NORMAL_ITEM;
MENU_CALLBACK;
MENU_SUGGESTED_ITEM;
MENU_LOCAL_ACTION;
MENU_LOCAL_TASK;
MENU_DEFAULT_LOCAL_TASK;

// Simple
$items['hello/foo'] = array(
  'title' => 'Untranslated Title',
  'description' => 'The untranslated description of the menu item.',
  'page callback' => 'module_page_hello_world',
  'page arguments' => array(0, 'world'),
  'access callback' => TRUE,
);

// -----------------------------------------------------------------------------
// Required Settings

function hook_menu() {
  $items['hello/foo'] = array(
    'title' => 'Untranslated Title',
    'description' => 'The untranslated description of the menu item.',
    'page callback' => 'module_page_hello_world',
    'page arguments' => array(0, 'world'),
    'access arguments' => array('access content'),
  );

  return $items;
}

// -----------------------------------------------------------------------------
// Wildcard

function hook_menu() {
  $items['hello/foo/%'] = array(
    'title' => 'Untranslated Title',
    'description' => 'The untranslated description of the menu item.',
    'page callback' => 'module_page_hello_world',
    'page arguments' => array(2),
    'access arguments' => array('access content'),
  );

  return $items;
}

function hook_menu() {
  $items['hello/foo/%abc'] = array(
    'title' => 'Untranslated Title',
    'description' => 'The untranslated description of the menu item.',
    'page callback' => 'module_page_hello_world',
    'page arguments' => array(2),
    'access arguments' => array('access content'),
  );

  return $items;
}

function abc_load($abc) {

}

function abc_to_arg($abc) {

}
