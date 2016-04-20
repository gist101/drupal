<?php

/**
 * Implements hook_theme().
 */
function hook_theme() {
  return array(
    'function_registry' => array(
      'variables' => array(),
    ),
    'tempalte_registry' => array(
      'variables' => array(
        'render element' => 'element',
      ),
      'template' => 'tempalte_registry',
    ),
  );
}

// =============================================================================
// Notes:
//   Usually put callback function in this same file is enough, if less than 3 registries.
//   Though it's possible to specify 'file' in theme_registry to create a separated file.

// -----------------------------------------------------------------------------
// Theme registry: function_registry

/**
 * Theme function for 'function_registry'.
 */
function theme_function_registry(&$vars) {

}

/**
 * Preprocess function for 'function_registry'.
 */
function template_preprocess_function_registry(&$vars) {

}

/**
 * Process function for 'function_registry'.
 */
function template_process_function_registry(&$vars) {

}

// -----------------------------------------------------------------------------
// Theme registry: template_registry

/**
 * Preprocess function for 'template_registry'.
 */
function template_preprocess_template_registry(&$vars) {

}

/**
 * Process function for 'template_registry'.
 */
function template_process_template_registry(&$vars) {

}
