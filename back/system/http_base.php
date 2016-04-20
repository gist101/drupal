<?php

// -----------------------------------------------------------------------------
// PHP globals

$_SERVER[];
$_POST[];
$_GET[];

// -----------------------------------------------------------------------------
// URL
// @see drupal_settings_initialize().

// The root URL of the host, excluding the path.
$base_root;
// The base path of the Drupal installation.
// It would just be '/' if it's not a sub directory install.
$base_path;
// The base URL of the Drupal installation.
$base_url;
//
$is_https;
//
$base_secure_url;
//
$base_insecure_url;

// -----------------------------------------------------------------------------
// Session

//
$cookie_domain;
