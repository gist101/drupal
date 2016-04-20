<?php

// -----------------------------------------------------------------------------
// 'bundle_form'
//
// @see eck__bundle__edit_form().
// Only auto save 'config_' prefix item.

// $vars
$vars = array(
  'entity' => Entity,
  'form' => array('entity_type', 'bundle'),
  'form_state' => array(),
);
// $config = $vars['form']['bundle']['#value']->config;
// $eck_entity_type = $vars['form']['entity_type']['#value']; // EntityType class.
// $eck_bundle = $vars['form']['bundle']['#value']; // Bundle class.

// Simple
/**
 * 'bundle_form' callback.
 */
function example_simple_property_bundle_form($property, $vars) {
  $form = &$vars['form'];
  $eck_entity_type = $form['entity_type']['#value'];
  $eck_bundle = $form['bundle']['#value'];
  $config = $eck_bundle->config;

  $form['config_simple'] = array(
    '#title' => t('Simple'),
    '#description' => t('Simple textfield.'),
    '#type' => 'textfield',
    '#size' => 255,
    '#default_value' => isset($config['simple']) ? $config['simple'] : 'abcd',
    '#weight' => 0,
  );

  return $vars;
}

// Multiple properties config
// $config = eck_extras_entity_get_bundle_config($rank);
// $config['PropertyName']['Config'];
function example_multiple_property_bundle_form($property, $vars) {
  $form = &$vars['form'];
  $eck_entity_type = $form['entity_type']['#value'];
  $eck_bundle = $form['bundle']['#value'];
  $config = $eck_bundle->config;

  $form['multiple'] = array(
    '#title' => t('Multiple'),
    '#type' => 'fieldset',
  );
  // This is
  // Each entityreference property get a separate settings
  foreach ($eck_entity_type->properties as $name => $property) {
    if ($property['behavior'] == 'PropertyName') {
      $container = 'config_' . $name;
      $form['multiple'][$container] = array(
        '#type' => 'fieldset',
        '#title' => $property['label'],
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
        '#tree' => TRUE,
      );
      $form['multiple'][$container]['select'] = array(
        '#type' => 'select',
        '#title' => t('Select'),
        '#options' => array(),
        '#default_value' => isset($config[$name]['select']) ? $config[$name]['select'] : '',
      );
      $form['multiple'][$container]['textfield'] = array(
        '#title' => t('Textfield'),
        '#description' => t('Input text to this control.'),
        '#type' => 'textfield',
        '#size' => 255,
        '#default_value' => isset($config[$name]['textfield']) ? $config[$name]['textfield'] : '',
        '#weight' => 0,
      );
    }
  }

  return $vars;
}

// -----------------------------------------------------------------------------
// Examples

// Tree structure array save.
function eck_extras_usin_property_bundle_form($property, $vars) {
  $form = &$vars['form'];
  $config = $vars['form']['bundle']['#value']->config;

  $form['config_usin'] = array(
    '#type' => 'fieldset',
    '#title' => t('USIN Property'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#tree' => TRUE,
    '#weight' => 10,
  );
  $form['config_usin']['source'] = array(
    '#title' => t('USIN Property Source'),
    '#description' => t('Enter the allowed characters for generating USIN.'),
    '#type' => 'textfield',
    '#size' => 128,
    '#default_value' => isset($config['usin']['source']) ? $config['usin']['source'] : '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    '#weight' => 0,
  );
  $form['config_usin']['length'] = array(
    '#title' => t('USIN Property Length'),
    '#description' => t('Enter the length of the generated USIN.'),
    '#type' => 'textfield',
    '#size' => 10,
    '#default_value' => isset($config['usin']['length']) ? $config['usin']['length'] : '10',
    '#weight' => 10,
  );

  return $vars;
}

// Name based config, not behavior based.
function eck_extras_entityreference_property_bundle_form($property, $vars) {
  $form = &$vars['form'];
  $eck_entity_type = $form['entity_type']['#value'];
  $eck_bundle = $form['bundle']['#value'];
  $config = $eck_bundle->config;

  $form['entityreference'] = array(
    '#title' => t('Entity reference'),
    '#type' => 'fieldset',
  );
  // This is 
  // Each entityreference property get a separate settings
  foreach ($eck_entity_type->properties as $name => $property) {
    if ($property['behavior'] == 'entityreference') {
      $container = 'config_' . $name;
      $form['entityreference'][$container] = array(
        '#type' => 'fieldset',
        '#title' => t('@label', array('@label' => $property['label'])),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
        '#tree' => TRUE,
      );
      $form['entityreference'][$container]['entity_type'] = array(
        '#type' => 'select',
        '#title' => t('Entity type'),
        '#options' => eck_extras_entity_type_options(),
        '#default_value' => isset($config[$name]['entity_type']) ? $config[$name]['entity_type'] : '',
      );
    }
  }

  return $vars;
}
