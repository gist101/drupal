<?php

// -----------------------------------------------------------------------------
// Class
// @see EntityMetadataWrapper
// @see EntityDrupalWrapper
// @see EntityListWrapper
// @see EntityStructureWrapper
// @see EntityValueWrapper
// @link http://drupalcontrib.org/api/drupal/contributions%21entity%21entity.api.php/function/implementations/hook_entity_property_info/7


// -----------------------------------------------------------------------------
// Info
// @see hook_entity_property_info().
// @link http://drupal7.api/api/entity/entity.api.php/function/hook_entity_property_info/7.x-1.x

$property_info_base = array(
  'label' => t(''),
  'type' => 'DATA_TYPE',
);

// entity.module
$property_info_all = array(
  'label' => t(''),
  'description' => t(''),
  'type' => 'DATA_TYPE',
  'bundle' => '',
  'options list' => 'CALLBACK',
  'getter callback' => 'CALLBACK', // entity_property_verbatim_get($data, array $options, $name, $type, $info).
  'setter callback' => 'CALLBACK',
  'validation callback' => 'CALLBACK',
  'access callback' => 'CALLBACK',
  'setter permission' => 'CALLBACK',
  'schema field' => '',
  'queryable' => FALSE, // Default to FALSE, but to TRUE if set 'schema field'.
  'required' => FALSE,
  'field' => FALSE, // If it's entity field.
  'computed' => FALSE,
  'entity views field' => FALSE, // Expose to views directly
  'sanitized' => FALSE,
  'sanitize' => 'check_plain', // CALLBACK
  'raw getter callback' => 'CALLBACK',
  'clear' => array(), // For cache clear, array of property names.
  'property info' => array(), // For 'struct' type to define dynamic type
  'property info alter' => 'CALLBACK',
  'property defaults' => array(),
  'auto creation' => 'CALLBACK',
  'translatable' => FALSE,
  'entity token' => TRUE, // Integrate with entity_token.module.
);

// DATA_TYPE
entity_property_types = array(
  'text',
  'token',
  'integer',
  'decimal',
  'date',
  'duration',
  'boolean',
  'uri',
  'ENTITY_TYPE',
  'entity',
  'struct',
  'list',
);

// -----------------------------------------------------------------------------
// Utility

//
$entity_property_info = entity_get_property_info($entity_type = NULL);
dsm($entity_property_info);


dsm(entity_get_property_info());
dsm(entity_get_all_property_info());

// Compare the difference
dsm(entity_get_property_info('node'));
dsm(entity_get_all_property_info('node'));

// -----------------------------------------------------------------------------
// Hook

hook_entity_property_info();
hook_entity_property_info_alter(&$info); // @invoke entity_get_property_info().

// Add property info to field.
// @see entity_field_info_alter().
hook_field_info();
hook_field_info_alter(&$info);

$info['FIELDTYPE']['property_type'] = '';
$info['FIELDTYPE']['property_callbacks'][] = '';


// -----------------------
// Test: 'getter callback'

// $info
$info = array(
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
  dsm($info, 'info'); // property info
}

// Return info that will be merged later.
function miiniu_pub_entity_property_info() {
  $info = array();
  $properties = &$info['node']['bundles']['publish']['properties'];

  $properties['publish_status'] = array(
    'label' => t('Publish status'),
    'description' => t('The processing status of this publication.'),
    'type' => 'text',
    'getter callback' => 'miiniu_pub_publish_get_properties',
    'computed' => TRUE,
    'entity views field' => TRUE,
  );

  return $info;
}

// 'bundles' usually contains fields property info.
// 'properties' usually contains data field in base table.
function hook_entity_property_info_alter(&$info) {
  foreach ($info as $entity_type => $entity_property_info) {
    if (isset($entity_property_info['bundles'])) {
      foreach ($entity_property_info['bundles'] as $bundle => $bundle_property_info) {
        foreach ($bundle_property_info['properties'] as $field => $field_property_info) {

          if (!$field_property_info['field']) continue;

          $field_info = field_info_field($field);
          if ($field_info['type'] != 'entityreference') continue;
          // dsm($field_info);

          $info[$entity_type]['bundles'][$bundle]['properties'][$field . '_revert'] = array(
              'label' => t('Revert of @field', array('@field' => $field)),
              'descriptoin' => t('Reverted relationship of @field.', array('@field' => $field)),
              'type' => 'list',
              'computed' => TRUE,
              'getter callback' => 'entityreference_revert_entity_property_getter_callback',
          );

        }
      }
    }
  }
}
