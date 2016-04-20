<?php

// @see template_preprocess_field().
// @see theme_field().
// @see field_attach_preprocess(). This preprocess the variables, use it.

// @doc http://drupal7.api/api/drupal/modules%21field%21field.module/function/theme_field/7.x
// @doc http://drupal7.api/api/drupal/modules%21field%21theme%21field.tpl.php/7.x
// @qa http://drupal.stackexchange.com/questions/25693/multiple-values-in-a-row

// Add specific suggestions that can override the default implementation.
$variables['theme_hook_suggestions'] = array(
  'field__' . $element['#field_type'],
  'field__' . $element['#field_name'],
  'field__' . $element['#bundle'],
  'field__' . $element['#field_name'] . '__' . $element['#bundle'],
);