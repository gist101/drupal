<?php

// -----------------------------------------------------------------------------
// Hooks
// @doc http://kalaxy7.api/api/kalaxy/modules!field!field.api.php/group/field_widget/kalaxy-7.x
// @doc _field_invoke(), http://kalaxy7.api/api/kalaxy/modules!field!field.attach.inc/function/calls/_field_invoke/kalaxy-7.x
// @doc _field_invoke_default(). http://kalaxy7.api/api/kalaxy/modules!field!field.attach.inc/function/calls/_field_invoke_default/kalaxy-7.x
// @doc field_attach_form(). http://kalaxy7.api/api/kalaxy/modules!field!field.attach.inc/function/field_attach_form/kalaxy-7.x
// @doc field_default_form(). http://kalaxy7.api/api/kalaxy/modules!field!field.form.inc/function/field_default_form/kalaxy-7.x
//
//
// hook_field_widget_info()
// hook_field_widget_settings_form($field, $instance)
// hook_field_widget_error($element, $error, $form, &$form_state)
// hook_field_widget_form(&$form, &$form_state, $field, $instance, $langcode, $items, $delta, $element)
// hook_field_widget_form_alter(&$element, &$form_state, $context)
// hook_field_widget_WIDGET_TYPE_form_alter(&$element, &$form_state, $context)
// hook_field_widget_properties_alter()


// -----------------------------------------------------------------------------
// API
//
// @see field_ui_field_edit_form().
// @see field_widget_field(). Use instead of field_info_field().
// @see field_widget_instance(). Use instead of field_info_instance().

// -----------------------------------------------------------------------------
// Instance settings
//
// 'default_value' @see field_get_default_value().
// 'default_value_function' @see field_get_default_value().

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

function hook_field_widget_settings_form($field, $instance) {
  $widget = $instance['widget'];
  $settings = $widget['settings'];

  if ($widget['type'] == 'text_textfield') {
    $form['size'] = array(
      '#type' => 'textfield',
      '#title' => t('Size of textfield'),
      '#default_value' => $settings['size'],
      '#element_validate' => array('element_validate_integer_positive'),
      '#required' => TRUE,
    );
  }
  else {
    $form['rows'] = array(
      '#type' => 'textfield',
      '#title' => t('Rows'),
      '#default_value' => $settings['rows'],
      '#element_validate' => array('element_validate_integer_positive'),
      '#required' => TRUE,
    );
  }

  return $form;
}

/**
 *  Implements hook_field_widget_form().
 */
function package_field_widget_form(&$form, &$form_state, $field, $instance, $langcode, $items, $delta, $element) {

  // Include #title, #description, #required, and other field and instance
  // properties provided by Field Form API.
  // $element['value'] = (array) $element;

  $title = isset($items[$delta]['title']) ? $items[$delta]['title'] : '';
  $description = isset($items[$delta]['description']) ? $items[$delta]['description'] : '';
  $pack = isset($items[$delta]['pack']) ? $items[$delta]['pack'] : array();
  $pack_input = implode(',', $pack);
  // @note It's said, in document, that Field API handles delta for you, so you don't need to include delta for returned element.
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

$element = array(
  '#entity_type' => '',
  '#bundle' => '',
  '#field_name' => '',
  '#language' => '',
  '#field_parents' => '',
  'columns' => array(),
  '#title' => t(''),
  '#description' => t(''),
  '#required' => FALSE,
  '#delta' => '',
);
