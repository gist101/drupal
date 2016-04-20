<?php

// @doc http://kalaxy7.api/api/kalaxy/modules!field!field.api.php/function/hook_field_widget_info/kalaxy-7.x

// hook_field_widget_info().

/**
 *  Implements hook_field_widget_info().
 */
function hook_field_widget_info() {
  return array(
    'WIDGET' => array(
      'label' => t('Widget title'),
      'description' => t(''),
      'field types' => array('Field type 1'),
      'settings' => array(
        'var 1' => 1,
      ),
    ),
  );
}

// @see hook_field_widget_info().
// @see field_default_form(). @see field_multiple_value_form(). For 'multiple values' usage.
$info = array(
  'label' => t('Widget title'),
  'description' => t(''),
  'field types' => array('Field type 1'),
  'settings' => array(
    'var 1' => 1,
  ),
  'behaviors' => array( // @optional
    'multiple values' => FIELD_BEHAVIOR_DEFAULT, // FIELD_BEHAVIOR_CUSTOM
    'default value' => FIELD_BEHAVIOR_DEFAULT, // FIELD_BEHAVIOR_NONE
  ),
  'weight' => 0, // @optional
);
