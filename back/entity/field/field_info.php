<?php

// -----------------------------------------------------------------------------
// Utility
// Field Info API
// @see http://drupal7.api/api/drupal/modules%21field%21field.info.inc/group/field_info/7.x

field_info_fields();

field_info_field($field_name);

field_info_instance($entity_type, $field_name, $bundle_name);

field_info_extra_fields($entity_type, $bundle, $context);

field_info_storage_types();

field_info_widget_types();

field_info_formatter_types();

// -----------------------------------------------------------------------------
// Utility


field_info_field_types($field_type = NULL);

field_info_fields();

field_info_instances($entity_type = NULL, $bundle_name = NULL);

// -----------------------------------------------------------------------------
// Hook

// @api http://drupal7.api/api/drupal/modules%21field%21field.api.php/function/hook_field_info/7.x

function hook_field_info() {
  return array(
    'example' => array(
      'label' => t('Example'),
      'description' => t('Description'),
      'settings' => array(),
      'instance_settings' => array(),
      'default_widget' => 'example_default',
      'default_formatter' => 'example_default',
      // 'no_ui' => FALSE,
    ),
  );
}

function file_field_info() {
  return array(
    'file' => array(
      'label' => t('File'),
      'description' => t('This field stores the ID of a file as an integer value.'),
      'settings' => array(
        'display_field' => 0,
        'display_default' => 0,
        'uri_scheme' => variable_get('file_default_scheme', 'public'),
      ),
      'instance_settings' => array(
        'file_extensions' => 'txt',
        'file_directory' => '',
        'max_filesize' => '',
        'description_field' => 0,
      ),
      'default_widget' => 'file_generic',
      'default_formatter' => 'file_default',
    ),
  );
}
