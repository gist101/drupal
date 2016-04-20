<?php

// @cookbook
// http://www.computerminds.co.uk/drupal-code/add-stuff-node-and-configure-it-fields

// @var
// variable_set('field_bundle_settings_' . $entity_type . '__' . $bundle, $settings);

// @api
hook_field_extra_fields();
hook_field_extra_fields_alter(&$info);
hook_node_view($node, $view_mode, $langcode);
hook_entity_view($entity, $type, $view_mode, $langcode);
//hook_field_attach_form($entity_type, $entity, &$form, &$form_state, $langcode);
//hook_field_attach_view_alter(&$output, $context); // The _field_extra_fields_pre_render() is not run, so no extra fields info?
hook_field_extra_fields_display_alter(&$displays, $context);
field_info_extra_fields($entity_type, $bundle, $context);
field_extra_fields_get_display($entity_type, $bundle, $view_mode);

// @see
// _field_extra_fields_pre_render()
// field_info_extra_fields()
// field_attach_form()
// field_attach_prepare_view()
// field_attach_view()
// field_attach_form_validate()
// field_attach_submit()
// node_build_content()

//
$pseudo_field = array(
  'label' => t(''),
  'description' => t(''),
  'weight' => t(''),
  'edit' => '',
  'delete' => '',
);

function hook_field_extra_fields() {
  $fields = array();
  $fields['ENTITY']['BUNDLE']['form'] = array(
    'my_additional_field' => array(
      'label' => t(''),
      'description' => t(''),
      'weight' => 0,
    ),
  );
  $fields['ENTITY']['BUNDLE']['display'] = array(
    'my_additional_field' => array(
      'label' => t(''),
      'description' => t(''),
      'weight' => 0,
    ),
  );

  return $fields;
}

// Form
function hook_field_attach_form($entity_type, $entity, &$form, &$form_state, $langcode) {
  $form['my_additional_field'] = array(
  );
}

function hook_field_attach_validate($entity_type, $entity, &$errors) {

}

function hook_field_attach_submit($entity_type, $entity, $form, &$form_state) {

}

// @see _field_extra_fields_pre_render()
$elements = array(
  '#entity_type' => '',
  '#bundle' => '',
  '#type' => '',
  '#weight' => 0,
);

// Display
function hook_field_attach_view_alter(&$output, $context) {
  $output['my_additional_field'] = array(
    '#markup' => $additional_field,
    '#weight' => 10,
    '#theme' => 'mymodule_my_additional_field',
  );
}

function hook_entity_view($entity, $view_mode, $langcode) {
  $entity->content['my_additional_field'] = array(
    '#markup' => $additional_field,
    '#weight' => 10,
    '#theme' => 'mymodule_my_additional_field',
  );
}

function hook_node_view($node, $view_mode, $langcode) {
  $node->content['my_additional_field'] = array(
    '#markup' => $additional_field,
    '#weight' => 10,
    '#theme' => 'mymodule_my_additional_field',
  );
}

$elements = array(
  '#entity_type' => '',
  '#bundle' => '',
  '#view_mode' => '',
  '#weight' => 0,
  '#access' => TRUE,
);

// -----------------------------------------------------------------------------
// Update Extra Fields Settings
// @see field_extra_fields_get_display().
// @see field_view_mode_settings().
// @see field_info_extra_fields(). // !!!
// @see hook_field_extra_fields_display_alter().
// @see field_bundle_settings(). // !!! Get/Set extra fields form/display settings.
//   variable_set('field_bundle_settings_' . $entity_type . '__' . $bundle, $settings);

dsm(field_extra_fields_get_display('fieldable_panels_pane', 'longtext', 'default'));

