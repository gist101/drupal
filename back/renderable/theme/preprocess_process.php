<?php

// 'preprocess functions'
// 'process functions'
// Both can be auto derived if something hook into hook_preprocess_HOOK(), hook_process_HOOK().

// preprocess functions:
// A list of functions used to preprocess this data. Ordinarily this won't be used; it's automatically filled in.
// By default, for a module this will be filled in as template_preprocess and template_preprocess_HOOK.
// For a theme this will be filled in as phptemplate_preprocess and phptemplate_preprocess_HOOK as well as themename_preprocess and themename_preprocess_HOOK.


// Does theme function has preprocess, process???
// Or just only template can have???
// !!! No totally correct, don't worry, both types of theme registry will call the preprocess_HOOK and process_HOOK functions.
// Even the template_preprocess_HOOK().
// But it won't call the template_preprocess() and template_process().
// ??? Will it call MODULE_preprocess(), MODULE_process()?

// Default variables
// @see _template_preprocess_default_variables();
$variables = array(

);

// ----------------------------------------------------------------------------
// Renderable Array
//
// #theme, #theme_wrapper
// Theme registry: variables or 'render element'

$renderable = array(
  '#var1' => '',
  '#var2' => '',
  '#theme' => '',
  '#theme_wrapper' => '',
);

// 'includes'

// 'preprocess functions', 'process functions

// 'theme_hook_suggestion'

// ----------------------------------------------------------------------------
// classes

// Preprocess
'classes_array'; // Change this in preprocess
// When try to add multiple classes with a string, no need to explode, just:
$vars['classes_array'][] = check_plain($entity->settings['classes']);
// When remove, just unset() it:
foreach ($vars['classes_array'] as $key => $css_class) {
  if ($css_class == 'fieldable-panels-pane') {
    unset($vars['classes_array'][$key]);
  }
}

// Process
'classes';


// ----------------------------------------------------------------------------
// Special 

field_attach_preprocess();

