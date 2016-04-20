<?php

// -----------------------------------------------------------------------------
// Installation filesystem

// The Drupal installation filesystem path.
// Every entry point define it:
//   - authorize.php
//   - cron.php
//   - index.php
//   - install.php
//   - update.php
//   - xmlrpc.php

// It's possible to use defined(DRUPAL_ROOT) to check if within Drupal realm.
DRUPAL_ROOT;

// -----------------------------------------------------------------------------
// Utility

// require_once drupal_get_path('module', 'MODULE') . '/' . MODULE.install;
drupal_get_path($type, $name);
drupal_get_filename($type, $name, $filename = NULL);
// Get the current drupal site directory
conf_path($require_settings = TRUE, $reset = FALSE);
