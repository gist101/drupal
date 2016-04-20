<?php

// Field Type
field_info_field_types($field_type = NULL);

// Field Base
field_info_field($field_name);
field_info_field_settings($type);
field_create_field();

// Field Instance
field_info_instance();
field_info_instance_settings($type);
field_info_widget_settings($type);
field_info_formatter_settings($type);
// @api https://api.drupal.org/api/drupal/modules%21field%21field.crud.inc/function/field_create_instance/7
field_create_instance();

// Field Settings



// =============================================================================
// Code Snippets

/**
 * Create a field that will be used to reference users from stores.
 * When an user is referenced from a store, it means that the user is a
 * member of that store.
 */
$field = field_info_field('cmp_m_store');
if (!$field) {
  field_create_field(array(
    'field_name' => 'cmp_m_store',
    'type' => 'entityreference',
    'cardinality' => FIELD_CARDINALITY_UNLIMITED,
    'settings' => array(
      'target_type' => 'user',
    ),
  ));
}
$instance = field_info_instance('commerce_store', 'cmp_m_store', 'store');
if (!$instance) {
  field_create_instance(array(
    'field_name' => 'cmp_m_store',
    'entity_type' => 'commerce_store',
    'bundle' => 'store',
    'label' => t('Members'),
    'widget' => array(
      'type' => 'store_entityreference_hidden_widget',
    ),
  ));
}
