<?php

// @file /includes/path.inc
// @link http://drupal7.api/api/drupal/includes%21path.inc/7.x
// @file /includes/bootstrap.inc


// ============================================================================
// Path & Path Alias

// ----------------------------------------------------------------------------
// Path

$_GET['q'];

request_path(); // In bootstrap stage, used to prepare $_GET['q'], or drupal_path_initialize().
current_path(); // Wrapper for $_GET['q'], it returns the system menu path, not alias.

// ----------------------------------------------------------------------------
// Path Test

// Preset Test
drupal_is_front_page();
path_is_admin();

drupal_match_path();

// ----------------------------------------------------------------------------
// Path Operations

path_load();
path_save();
path_delete();

drupal_lookup_path();
drupal_match_path();

// ----------------------------------------------------------------------------
// Path Alias

// Go through this function to match a existing menu routing item.
drupal_get_normal_path($path = NULL, $path_language = NULL); // Get the source path by input alias
drupal_get_path_alias($path = NULL, $path_language = NULL); // Get the alias path by input source

// Parse income url to be drupal usable path.
hook_url_inbound_alter(&$path, $original_path, $path_language);
// Prepare the web page link to match the designed IA url that would be
// input/display/click and pass to hook_url_inbound_alter() in new request.
// @see url().
// @see l().
hook_url_outbound_alter();

// Question:
// Which is better:
// * Provide generic url then use url().
// * Provide the product url in theme directly.

// ----------------------------------------------------------------------------
// Unrelated echo functions.

drupal_get_path(); // Get filesystem path.

// ----------------------------------------------------------------------------
// Path Alter
// @link http://drupal.stackexchange.com/questions/19234/what-is-the-difference-between-implementing-hook-url-inbound-alter-and-hook-ur

// ----------------------------------------------------------------------------
// Admin Path

path_is_admin();
path_get_admin_paths();

hook_admin_paths();
hook_admin_paths_alter();
hook_admin_menu_map();
hook_admin_menu_output_alter();
hook_admin_menu_output_build();
hook_admin_menu_replacements();
hook_admin_menu_cache_info();
