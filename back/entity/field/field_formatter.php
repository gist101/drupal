<?php

// -----------------------------------------------------------------------------
// Documents

// @doc http://drupal7.api/api/drupal/modules%21field%21field.api.php/group/field_formatter/7.x
// @doc http://drupal7.api/api/drupal/modules%21field%21field.attach.inc/function/field_attach_view/7.x

// @module https://www.drupal.org/project/field_formatter_settings

// -----------------------------------------------------------------------------
// Hooks

/*
hook_field_formatter_info()
hook_field_formatter_info_alter(&$info)
hook_field_formatter_settings_form($field, $instance, $view_mode, $form, &$form_state)
hook_field_formatter_settings_summary($field, $instance, $view_mode)
hook_field_formatter_prepare_view($entity_type, $entities, $field, $instances, $langcode, &$items, $displays)
hook_field_formatter_view($entity_type, $entity, $field, $instance, $langcode, $items, $display)
*/

/**
 * Implements hook_field_formatter_info().
 */
function MODULE_field_formatter_info() {
  return array(
    'FORMATTER' => array(
      'label' => t(''),
      'field types' => array('FIELD_TYPE'),
    ),
    'FORMATTER' => array(
      'label' => t(''),
      'field types' => array('FIELD_TYPE_1', 'FIELD_TYPE_2'),
      'settings' => array(
        'var_1' => '',
        'var_2' => '',
      ),
    ),
  );
}

/**
 * Implements hook_field_formatter_settings().
 */
function MODULE_field_formatter_settings_form($field, $instance, $view_mode, $form, &$form_state) {
  dsm($field, '$field');
  dsm($instance, '$instance');
  dsm($view_mode, '$view_mode');
  dsm($form, '$form');
  dsm($form_state, '$form_state');


  $display = $instance['display'][$view_mode];
  $settings = $display['settings'];

  if ($display['type'] == 'ktopic_logos') {
    $element['type'] = array(
      '#type' => 'select',
      '#title' => t('Logo type'),
      '#options' => ktopic_logo_types(),
      '#default_value' => $settings['type'],
    );
    $element['link'] = array(
      '#type' => 'checkbox',
      '#title' => t('Link to topic'),
      '#default_value' => $settings['link'],
    );
    kore_include('image');
    $id = array(
      $field['field_name'],
      'settings_edit_form',
      'settings',
      'image',
    );
    $element['image'] = kore_image_settings_form($id, 'fields', $settings['image']);
  }

  return $element;
}

/**
 * Implements hook_field_formatter_settings_summary().
 */
function MODULE_field_formatter_settings_summary($field, $instance, $view_mode) {
  dsm($field, '$field');
  dsm($instance, '$instance');
  dsm($view_mode, '$view_mode');

  $display = $instance['display'][$view_mode];
  $settings = $display['settings'];

  $summary = '';

  if (strpos($display['type'], '_trimmed') !== FALSE) {
    $summary = t('Trim length') . ': ' . $settings['trim_length'];
  }

  return $summary;
}

/**
 * Implements hook_field_formatter_prepare_view().
 */
function MODULE_field_formatter_prepare_view($entity_type, $entities, $field, $instances, $langcode, &$items, $displays) {

}

/**
 * Implements hook_field_formatter_view().
 */
function MODULE_field_formatter_view($entity_type, $entity, $field, $instance, $langcode, $items, $display) {
  $element = array();

  switch ($display['type']) {
    case '':
      break;
    case '':
      break;
  }

  dsm($entity_type, '$entity_type');
  dsm($entity, '$entity');
  dsm($field, '$field');
  dsm($instance, '$instance');
  dsm($langcode, '$langcode');
  dsm($items, '$items');
  dsm($display, '$display');

  $element = array();

  switch ($display['type']) {
    case 'ktopic_default':
      break;
    case 'ktopic_logos':
      // Common, passed in
      $element = array(
        '#theme' => 'field',
      );
      foreach ($items as $delta => $item) {
        $element[$delta] = array(
          '#markup' => '',
        );
      }
      /* Override
      $element = array(
        //'#entity_type' => $entity_type, // Will be added whatever
        //'#entity' => $entity,
        //'#field' => $field,
        //'#instance' => $instance,
        //'#langcode' => $langcode,
        //'#items' => $items, // Will be added whatever
        '#display' => $display,
        '#theme' => 'ktopic_logos',
      );
      */
      break;
  }

  // If render item individually
  foreach ($items as $delta => $item) {
    $element[$delta] = array(
      '#markup' => '',
    );
  }

  // If render all items at once
  $element[0] = array(
    '#markup' => '',
  );

  return $element;
}

// @see field_attach_view().
array(
  'field_foo' => array(
    '#theme' => 'field',
    '#title' => 'the label of the field instance',
    '#label_display' => 'the label display mode',
    '#object' => 'the fieldable entity being ',
    '#entity_type' => 'the type of the entity being displayed',
    '#language' => 'the language of the field values being displayed',
    '#view_mode' => 'the view mode',
    '#field_name' => 'the name of the field',
    '#field_type' => 'the type of the field',
    '#formatter' => 'the name of the formatter',
    '#items' => 'the field values being displayed',
    // The element's children are the formatted values returned by
    // hook_field_formatter_view().
  ),
);

// -----------------------------------------------------------------------------
// Info, Settings

$formatter_info = array(
  'label' => t('Trimmed'),
  'field types' => array('text', 'text_long', 'text_with_summary'),
  'settings' => array('trim_length' => 600),
);

field_info_formatter_types($formater_type = NULL);

// Default settings values
field_info_formatter_settings('picture');

// -----------------------------------------------------------------------------
// UI

// Settings form
// @see field_ui_display_overview_form().


