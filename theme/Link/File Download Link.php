<?php

// @doc
// http://drupal7.api/api/drupal/modules%21file%21file.module/function/theme_file_link/7.x
// http://drupal7.api/api/drupal/modules%21file%21file.module/function/theme_file_icon/7.x

// @cookbook
// http://www.alisonhover.com/blog/201208/how-customise-default-file-icons-drupal-7

// @api
theme('file_link', array(
  'file' => $file,
  'icon_directory' => NULL,
));

// $icon_directory = variable_get('file_icon_directory', drupal_get_path('module', 'file') . '/icons');
theme('file_icon', array(
  'file' => $file,
  'icon_directory' => NULL,
));



