<?php

// Theme
// @see drupal_theme_initialize().
$setting['ajaxPageState'] = array(
    'theme' => $theme_key,
    'theme_token' => drupal_get_token($theme_key),
);
drupal_add_js($setting, 'setting');
