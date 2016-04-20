<?php

// @api http://drupal7.api/api/drupal/developer%21topics%21forms_api_reference.html/7.x

// -----------------------------------------------------------------------------
// Hooks

hook_element_info();
hook_element_info_alter(&$types); // In element_info(), alter in runtime.

// -----------------------------------------------------------------------------
// Utility

// ----------------
// Get element info
// element_info($type)
// @see drupal_render(). '#defaults_loaded'.

// Get all elements info
dsm(module_invoke_all('element_info'));

// Get specific module defined elemenets
dsm(module_invoke('ModuleName', 'element_info'));
// Great Example: system.module
dsm(module_invoke('system', 'element_info'));

$element_info = array(
	'' => '',
  '' => '',
);

// -----------------------------------------------------------------------------
// Modules


