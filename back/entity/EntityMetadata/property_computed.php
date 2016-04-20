<?php

// -----------------------
// Test: 'getter callback'

// $info
$info = array(
  'type' => '',
  'computed' => TRUE,
  'getter callback' => '',
);

$entity_wrapper = entity_metadata_wrapper('test_entity', 1);
$entity_wrapper->field_test_ref_revert->value(); // This method calls will lead to call the 'getter callback'.

// entity_property_verbatim_get($data, array $options, $name, $type, $info)
function entity_property_verbatim_get($data, array $options, $name, $type, $info) {
  dsm($data, 'data'); // entity object
  dsm($options, 'options');
  dsm($name, 'name'); // field name
  dsm($type, 'type'); // entity_type name
  dsm($info, 'info');
}

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

function entityreference_revert_entity_property_info_alter(&$info) {
  foreach ($info as $entity_type => $entity_property_info) {
    if (isset($entity_property_info['bundles'])) {
      foreach ($entity_property_info['bundles'] as $bundle => $bundle_property_info) {
        foreach ($bundle_property_info['properties'] as $field => $field_property_info) {
          if (!$field_property_info['field']) continue;
          $field_info = field_info_field($field);
          if ($field_info['type'] != 'entityreference') continue;
          // dsm($field_info);
          // Here, we know we could add the entityreference_revert property to the bundle.
          // @note This implementation may conflict with a same name field, should be clearly documented.
          // @todo Wrong, need to add to the referenced entity, not this entity.
          /*
          $info[$entity_type]['bundles'][$bundle]['properties'][$field . '_revert'] = array(
            'label' => t('Revert of @field', array('@field' => $field)),
            'descriptoin' => t('Reverted relationship of @field.', array('@field' => $field)),
            'type' => 'list',
            'computed' => TRUE,
            'getter callback' => 'entityreference_revert_entity_property_getter_callback',
          );
          */
        }
      }
    }
  }
}

/**
 * 'getter callback' for property in EntityMetadataWrapper.
 */
function entityreference_revert_entity_property_getter_callback($data, array $options, $name, $type, $info) {
  list($id, $vid, $bundle) = entity_extract_ids($type, $data);
  $field = substr($name, 0, strlen($name) - 7);
  $entities = entityreference_revert_get_entities($field, $id, $info['langcode']);

  return $entities;
}

// ------------------------------
// Mirror existing field property

function dir_entity_property_info() {
  $info = array();
  // Add 'parent'/'child' property to dir_container category.
  $info['dir_container']['bundles']['category']['properties']['parent'] = array(
    'label' => t('Parent category'),
    'descriptoin' => t('List of parent categories.'),
    'type' => 'list<dir_container>',
    'computed' => TRUE,
    'getter callback' => 'dir_container_category_parent_entity_property_getter',
  );
}

/**
 * 'getter callback' for dir_container category parent property.
 */
function dir_container_category_parent_entity_property_getter($data, array $options, $name, $type, $info) {
  // Just a mirror of field_dir_category_parent.
  return entity_metadata_field_property_get($data, $options, 'field_dir_category_parent', $type, $info);
}
