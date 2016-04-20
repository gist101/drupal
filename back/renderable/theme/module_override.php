<?php

// @doc https://www.drupal.org/node/715160
// @doc https://www.drupal.org/node/715160#comment-7891529

// Only can override base theme registry???

/*
function kpane_theme_registry_alter(&$theme_registry) {
  $theme_registry_copy = $theme_registry;
  $module_path = drupal_get_path('module', 'kpane');
  _theme_process_registry($theme_registry_copy, 'phptemplate', 'theme_engine', '', $module_path);
  $theme_registry += array_diff_key($theme_registry_copy, $theme_registry);
  // A list of templates the module will provide templates for
  $hooks = array('panels_pane', 'fieldable_panels_pane');
  foreach ($hooks as $hook) {
    // Add the key 'theme paths' if it doesn't exist in this theme's registry
    if (!isset($theme_registry[$hook]['theme paths'])) {
      $theme_registry[$hook]['theme paths'] = array();
      if (isset($theme_registry[$hook]['theme path'])) {
        $theme_registry[$hook]['theme paths'][] = $theme_registry[$hook]['theme path'];
        $theme_registry[$hook]['theme path'] = $module_path;
      }
    }
    // Shift this module's directory to the top of the theme path list
    if (is_array($theme_registry[$hook]['theme paths'])) {
      $first_element = array_shift($theme_registry[$hook]['theme paths']);
      if ($first_element) {
        array_unshift($theme_registry[$hook]['theme paths'], $first_element, $module_path);
      }
      else {
        array_unshift($theme_registry[$hook]['theme paths'], $module_path);
      }
    }
  }
}
*/

function kpane_theme_registry_alter(&$theme_registry) {
  // Defined path to current module.
  $module_path = drupal_get_path('module', 'kpane');
  // Find all .tpl.php files in this module's folder recursively.
  $template_file_objects = drupal_find_theme_templates($theme_registry, '.tpl.php', $module_path);
  // Itterate through all found template file objects.
  foreach ($template_file_objects as $key => $template_file_object) {
    // If the template has not already been overridden by a theme.
    if (!preg_match('#/themes/#', $theme_registry[$key]['theme path'])) {
      // Alter the theme path and template elements.
      $theme_registry[$key]['theme path'] = $module_path;
      $theme_registry[$key] = array_merge($theme_registry[$key], $template_file_object);
    }
  }
}

// @doc http://www.zyxware.com/articles/3691/drupal-7-how-to-add-a-template-file-to-theme-a-view-inside-your-custom-module

function modulename_theme($existing, $type, $theme, $path) {
  return array (
    'views_view_table__list_customers__page' => array (
      'variables' => array('view' => NULL, 'options' => NULL, 'rows' => NULL, 'title' => NULL),
      'template' => 'views-view-table--list-customers--page' ,
      'base hook' => 'views_view_table',
      'path' => drupal_get_path('module', 'modulename'),
    ),
  );
}
