<?php


// ============================================================================
// Module Weight
// Module executing order.

// ----------------------------------------------------------------------------
// @link https://www.drupal.org/node/110238
// @link http://stackoverflow.com/questions/4671308/set-drupal-module-weight

/**
 * Implementation of hook_install()
 */
function devel_install() {
  drupal_install_schema('devel');

  // New module weights in core: put devel as the very last in the chain.
  db_query("UPDATE {system} SET weight = 88 WHERE name = 'devel'");

  // ...
}

// ----------------------------------------------------------------------------
// @module https://www.drupal.org/project/modules_weight
// UI settings.
