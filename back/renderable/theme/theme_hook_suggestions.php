<?php

// ============================================================================

/**
 *  Implements hook_preprocess().
 */
function ktopic_preprocess(&$vars, $hook) {
  if ($hook == 'page' && isset($vars['node'])) {
    $ktopic = $vars['node'];
    if (ktopic_is_ktype($ktopic, 'Broker')) {
      $vars['theme_hook_suggestions'][] = 'page__node__ktopic';
    }
  }
}

// ----------------------------------------------------------------------------
// Consider module weight as well.
// Usable module: modules_weight.module

/**
 * @implements hook_install().
 */
function fxpp_install() {
  // Set a weight after ktopic.module.
  db_update('system')
    ->fields(array('weight' => 10))
    ->condition('name', 'fxpp', '=')
    ->execute();
}


// ============================================================================

// Templates

$template = 'REGISTRY--LAYER1--LAYER2.tpl.php';


// Functions

$function = 'THEME_REGISTRY__LAYER1__LAYER2()';
