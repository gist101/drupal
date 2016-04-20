<?php

// -----------------------------------------------------------------------------
// Load theme registry.
// @see drupal_pre_render_*().
// @file /includes/theme.inc.

dsm(theme_get_registry());

// ----------------------------------------------------------------------------
// 'theme_hook_suggestions' magic
//
// @see theme_get_registry().
// This array varies in different location, it would automatically register theme suggestion template.
// @api http://drupal7.api/api/drupal/includes%21bootstrap.inc/class/DrupalCacheArray/7.x

dsm(theme_get_registry()); // Results are very difference called in module and theme.

// -----------------------------------------------------------------------------
// (!!!)
// Template engine use *_theme() to add suggested hook registry.
// Reverse search style, use found files' name to pick 'base hook'.
// @see drupal_find_theme_functions().
// @see drupal_find_theme_templates().

/**
 * Implements hook_theme().
 */
function phptemplate_theme($existing, $type, $theme, $path) {
  $templates = drupal_find_theme_functions($existing, array($theme));
  $templates += drupal_find_theme_templates($existing, '.tpl.php', $path);
  return $templates;
}


// -----------------------------------------------------------------------------
// Define a registry.
// @see hook_theme().
// @see hook_theme_registry_alter(). // Runtime alter after _theme_build_registry(), this means 'preprocess', 'process' auto filled in.
// @see _theme_build_registry(). // Call module_implements('theme').
// @see _theme_process_registry(). // Two phases 'preprocess functions' => 'preprocess', 'process' to lookup functions.
// @api http://drupal7.api/api/drupal/modules%21system%21system.api.php/function/hook_theme/7.x
// @doc http://drupal7.api/api/drupal/includes%21theme.inc/function/_theme_build_registry/7.x
// @doc http://drupal7.api/api/drupal/includes%21theme.inc/function/_theme_process_registry/7.x
// @doc https://drupal.org/node/933976
// @doc http://wearepropeople.com/blog/theming-layers-in-drupal

$registry = array(
  'variables' => array(),
  'render element' => '',
  'file' => '', // Related to 'path' or Add-on 'type' root folder, put preprocess, process in it.
  'path' => '', // The current MODULE path
  'template' => '',
  'function' => '',
  'base hook' => '',
  'pattern' => '__',
  'preprocess functions' => array(),
  'override preprocess functions' => FALSE, // Being used by theme to ignore other preprocess functions.
  // 'override process functions' => FALSE, // Seems possible, @see _theme_process_registry().
  'type' => '',
  'theme path' => '',
);

// 'file' and 'base hook' 'file' will be 'includes'.
$registry = array(
  'includes' => array(), // Relative path to file, include_once DRUPAL_ROOT . '/' . $include_file;
);

// preprocess functions:
// A list of functions used to preprocess this data. Ordinarily this won't be used; it's automatically filled in.
// By default, for a module this will be filled in as template_preprocess and template_preprocess_HOOK.
// For a theme this will be filled in as phptemplate_preprocess and phptemplate_preprocess_HOOK as well as themename_preprocess and themename_preprocess_HOOK.

// -----------------------------------------------------------------------------
// Function implementation

/**
 * Implements hook_theme()
 */
function HOOK_theme() {
  return array(
    'REGISTRY' => array( // Theme hook name.
      'variables' => array(''), // Passed default arguments.
    ),
  );
}

// -----------------------------------------------------------------------------
// Template implementation

/**
 * Implements hook_theme()
 */
function HOOK_theme() {
  return array(
    'REGISTRY' => array(
      'variables' => array(
        'render element' => 'element',
      ),
      'template' => 'templates/mymodule-template', // Path to your template file.
    ),
  );
}

// mymodule-template.tpl.php
/*
<div class="custom-template">
<h2 class="title"><?php if ($page_title): print $page_title; endif; ?></h2>
 <div class="text">
   <?php if ($page_text):?>
     <p><?php print $page_text; ?></p>
   <?php endif; ?>
 </div>
 <div class="alter-data">
   <?php if ($alter_data): ?>
     <p><?php print $alter_data; ?></p>
   <?php endif; ?>
 </div>
</div>
*/

// MODULE_preprocess_REGISTRY(&$variables);
// @api http://drupal7.api/api/drupal/includes%21theme.inc/function/theme/7.x
function MODULE_preprocess_REGISTRY(&$variables) {
  $variables['page_text'] .= ' This line was added from preprocess_mymodule_template().';
}

// -----------------------------------------------------------------------------
// 'render element'


// -----------------------------------------------------------------------------
// Test sub registry.

array(
  'kitem' => array(
    'variables' => array(
      'item' => NULL,
      'settings' => array(),
    ),
    'file' => 'theme/kitem.inc',
    'template' => 'theme/kitem',
  ),
  'kitem__media' => array(
    'base hook' => 'kitem',
    // Parent file, and this file will be loaded
    // template_preprocess_kitem() will be called, kore_preprocess_kitem() will be called.
    // template_preprocess_kitem__media() will not be called, kore_preprocess_kitem__media() will not be called.
    //'file' => 'theme/kitem__media.inc',
    'template' => 'theme/kitem--media',
  ),
);
