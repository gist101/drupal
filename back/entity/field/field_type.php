<?php

// @doc http://drupal7.api/api/drupal/modules%21field%21field.api.php/group/field_types/7.x


// =============================================================================
// Hooks

/*
hook_field_schema($field)
hook_field_info()
hook_field_settings_form($field, $instance, $has_data)
hook_field_instance_settings_form($field, $instance)
hook_field_is_empty($item, $field)
*/

// -----------------------------------------------------------------------------
// example.install

/**
 * Implements hook_field_schema().
 */
function example_field_schema($field) {
  return array(
    'columns' => array(
      'value' => array(
        'type' => 'int',
        'not null' => FALSE,
      ),
    ),
    'indexes' => array(
      'value' => array('value'),
    ),
  );
}

/**
 * Implements hook_field_schema().
 */
function example_field_schema($field) {
  $schema['columns']['value'] = array(
    'description' => 'The URL string.',
    'type' => 'text',
    'size' => 'big',
    'not null' => FALSE,
  );

  return $schema;
}

// -----------------------------------------------------------------------------
// example.module

// Field Type Definition
/**
 * Implements hook_field_info().
 */
function example_field_info() {
  return array(
    'list_integer' => array(
      'label' => t('List (integer)'),
      'description' => t("This field stores integer values from a list of allowed 'value => label' pairs, i.e. 'Lifetime in days': 1 => 1 day, 7 => 1 week, 31 => 1 month."),
      'settings' => array('allowed_values' => array(), 'allowed_values_function' => ''),
      'default_widget' => 'options_select',
      'default_formatter' => 'list_default',
    ),
  );
}

function example_field_settings_form($field, $instance, $has_data) {
  $settings = $field['settings'];

  $form['allowed_types'] = array(
    '' => '',

  );

  return $form;
}

function example_field_instance_settings_form() {

}

function example_field_is_empty($item, $field) {
  if (empty($item['value']) && (string) $item['value'] !== '0') {
    return TRUE;
  }
  return FALSE;
}

// -----------------------------------------------------------------------------
// Widget & Formatter

/**
 *  Implements hook_field_widget_info().
 */
function package_field_widget_info() {
  return array(
    'package_textarea' => array(
      'label' => t('Text area'),
      'field types' => array('package'),
      'settings' => array('rows' => 5),
    ),
  );
}

/**
 *  Implements hook_field_widget_form().
 */
function package_field_widget_form(&$form, &$form_state, $field, $instance, $langcode, $items, $delta, $element) {
  $title = isset($items[$delta]['title']) ? $items[$delta]['title'] : '';
  $description = isset($items[$delta]['description']) ? $items[$delta]['description'] : '';
  $pack = isset($items[$delta]['pack']) ? $items[$delta]['pack'] : array();
  $pack_input = implode(',', $pack);
  $element['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#default_value' => $title,
  );
  $element['description'] = array(
    '#type' => 'textarea',
    '#title' => t('Description'),
    '#default_value' => $description,
    '#rows' => 3,
  );
  $element['pack'] = array(
    '#type' => 'textarea',
    '#title' => t('Pack'),
    '#default_value' => $pack_input,
    '#rows' => $instance['widget']['settings']['rows'],
    '#attributes' => array('class' => array('text-full')),
  );

  return $element;
}

function example_field_formatter_info() {
  return array(
    'list_default' => array(
      'label' => t('Default'),
      'field types' => array('list_integer', 'list_float', 'list_text', 'list_boolean'),
    ),
  );
}

/**
 * Implements hook_field_formatter_view().
 */
function number_field_formatter_view($entity_type, $entity, $field, $instance, $langcode, $items, $display) {
  $element = array();
  $settings = $display['settings'];

  switch ($display['type']) {
    case 'number_integer':
    case 'number_decimal':
      foreach ($items as $delta => $item) {
        $output = number_format($item['value'], $settings['scale'], $settings['decimal_separator'], $settings['thousand_separator']);
        if ($settings['prefix_suffix']) {
          $prefixes = isset($instance['settings']['prefix']) ? array_map('field_filter_xss', explode('|', $instance['settings']['prefix'])) : array('');
          $suffixes = isset($instance['settings']['suffix']) ? array_map('field_filter_xss', explode('|', $instance['settings']['suffix'])) : array('');
          $prefix = (count($prefixes) > 1) ? format_plural($item['value'], $prefixes[0], $prefixes[1]) : $prefixes[0];
          $suffix = (count($suffixes) > 1) ? format_plural($item['value'], $suffixes[0], $suffixes[1]) : $suffixes[0];
          $output = $prefix . $output . $suffix;
        }
        $element[$delta] = array('#markup' => $output);
      }
      break;

    case 'number_unformatted':
      foreach ($items as $delta => $item) {
        $element[$delta] = array('#markup' => $item['value']);
      }
      break;
  }

  return $element;
}
