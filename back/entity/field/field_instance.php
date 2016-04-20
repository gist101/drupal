<?php

// Info
field_info_instance($entity_type, $field_name, $bundle_name);
field_read_instance($entity_type, $field_name, $bundle, $include_additional = array());

field_info_instances($entity_type, $bundle_name);

//

//
hook_field_instance_settings_form($field, $instance);

// -----------------------------------------------------------------------------
// $instance

$instance = array(
  'label' => '',
  'widget' => array(),
  'settings' => array(),
  'display' => array(),
  'required' => FALSE,
  'description' => '',
  'id' => 0, // entity_id,
  'field_id' => 0,
  'field_name' => '',
  'entity_type' => '',
  'bundle' => '',
  'deleted' => FALSE,
);

// =============================================================================
// Field Instance Settings Form

// Alter form method
// @see field_ui_field_edit_form().
/**
 * Implements hook_form_BASE_FORM_ID_alter().
 */
function hook_form_field_ui_field_edit_form_alter(&$form, &$form_state, $form_id) {
  // @debug
  dpm($form, '$form');
  dpm($form_state, '$form_state');
  dpm($form_id, '$form_id');

  // Useful data
  $field = $form['#field'];
  $instance = $form['#instance'];
  dpm($field, '$field');
  dpm($instance, '$instance');
  $entity_type = $instance['entity_type'];

  // You can get the value from $form['#instance'] later.
  // It's tree value.
  $form['instance']['ELEMENT'] = array(
    '#type' => 'checkbox',
    '#title' => t('ELEMENT'),
    '#default_value' => isset($form['#instance']['ELEMENT']) ? $form['#instance']['ELEMENT'] : FALSE,
    '#weight' => 100,
  );

  // Or
  $form['instance']['settings']['ELEMENT'] = array(
    '#type' => 'checkbox',
    '#title' => t('ELEMENT'),
    '#default_value' => isset($form['#instance']['settings']['ELEMENT']) ? $form['#instance']['settings']['ELEMENT'] : FALSE,
    '#weight' => 100,
  );
}
