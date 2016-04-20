<?php

// -----------------------------------------------------------------------------
// EntityMetadataWrapper test

// @link http://eck.d7dev:8082/devel/php
$entity_wrapper = entity_metadata_wrapper('test_entity', 1);
$entity_wrapper->field_test_ref_revert->value(); // This method calls will lead to call the 'getter callback'.



// -----------------------------------------------------------------------------
// Hook implementation
// Use either would be OK.

/**
 * Implements hook_entity_property_info().
 *
 * Add [field_entityreference]_revert to the referenced bundle.
 */
function entityreference_revert_entity_property_info() {
  $info = array();
  $fields_info = field_info_fields();
  foreach ($fields_info as $field => $field_info) {
    if ($field_info['type'] == 'entityreference') {
      $entity_type_referenced = $field_info['settings']['target_type'];
      // Just add a property that with the original field name and '_revert' suffix.
      $info[$entity_type_referenced]['properties'][$field . '_revert'] = array(
          'label' => t('Revert of @field', array('@field' => $field)),
          'descriptoin' => t('Reverted relationship of @field.', array('@field' => $field)),
          'type' => 'list',
          'computed' => TRUE,
          'getter callback' => 'entityreference_revert_entity_property_getter_callback',
      );
    }
  }

  return $info;
}

/**
 * Implements hook_entity_property_info_alter().
 *
 * Add [field_entityreference]_revert to the referenced bundle.
 */
function entityreference_revert_entity_property_info_alter(&$info) {
  $fields_info = field_info_fields();
  foreach ($fields_info as $field => $field_info) {
    if ($field_info['type'] == 'entityreference') {
      $entity_type_referenced = $field_info['settings']['target_type'];
      // Just add a property that with the original field name and '_revert' suffix.
      $info[$entity_type_referenced]['properties'][$field . '_revert'] = array(
          'label' => t('Revert of @field', array('@field' => $field)),
          'descriptoin' => t('Reverted relationship of @field.', array('@field' => $field)),
          'type' => 'list',
          'computed' => TRUE,
          'getter callback' => 'entityreference_revert_entity_property_getter_callback',
      );
    }
  }
}
