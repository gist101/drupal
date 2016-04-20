<?php

// -----------------------------------------------------------------------------
// Doc
//
// http://drupal7.api/api/drupal/modules!system!system.api.php/function/hook_permission/7.x

// -----------------------------------------------------------------------------
// Hook
//
// hook_permission();

// -----------------------------------------------------------------------------
// API
//
// user_access($string, $account = NULL);

// =============================================================================
// Hooks

$permission = array(
  'title' => t(''),
  'description' => t(''), // @optional
  'redirect access' => FALSE, // @optional
  'warning' => t(''), // @optional
);

function hook_permission() {
  return array(
    'administer my module' => array(
      'title' => t('Administer my module'),
      'description' => t('Perform administration tasks for my module.'),
    ),
  );
}
