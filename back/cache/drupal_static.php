<?php

// -----------------------------------------------------------------------------
// Normal drupal_static

function language_list($field = 'language') {
  $languages = &drupal_static(__FUNCTION__);
  if (!isset($languages)) {
    // If this function is being called for the first time after a reset,
    // query the database and execute any other code needed to retrieve
    // information about the supported languages.
    //...
  }
  if (!isset($languages[$field])) {
    // If this function is being called for the first time for a particular
    // index field, then execute code needed to index the information already
    // available in $languages by the desired field.
    //...
  }
  // Subsequent invocations of this function for a particular index field
  // skip the above two code blocks and quickly return the already indexed
  // information.
  return $languages[$field];
}
function locale_translate_overview_screen() {
  // When building the content for the translations overview page, make
  // sure to get completely fresh information about the supported languages.
  drupal_static_reset('language_list');
  //...
}

// -----------------------------------------------------------------------------
// Custom static, not affected by drupal_static_reset()

function actions_do() {
  // $stack tracks the number of recursive calls.
  static $stack;
  $stack++;
  if ($stack > variable_get('actions_max_stack', 35)) {
    //...
    return;
  }
  //...
  $stack--;
}

// -----------------------------------------------------------------------------
// Advanced drupal_static pattern.
// 1. Use static variable
// 2. Only call drupal_static() once.
// 3. Array item allowed to be variable, seems array item is just an address pointer.

function element_info($type) {
  // Use the advanced drupal_static() pattern, since this is called very often.
  static $drupal_static_fast;
  if (!isset($drupal_static_fast)) {
    $drupal_static_fast['cache'] = &drupal_static(__FUNCTION__);
  }
  $cache = &$drupal_static_fast['cache'];

  if (!isset($cache)) {
    $cache = module_invoke_all('element_info');
    foreach ($cache as $element_type => $info) {
      $cache[$element_type]['#type'] = $element_type;
    }
    // Allow modules to alter the element type defaults.
    drupal_alter('element_info', $cache);
  }

  return isset($cache[$type]) ? $cache[$type] : array();
}
