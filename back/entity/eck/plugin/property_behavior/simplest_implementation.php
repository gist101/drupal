<?php

$plugin = array(
  'label' => t('Plugin'),
  'default_widget' => 'Module_Plugin_property_default_widget',
  'default_formatter' => 'Module_Plugin_property_default_formatter',
);

/**
 * 'default_widget' callback, return themeable array.
 */
function Module_Plugin_property_default_widget($property, $vars) {
  dsm($property, 'property');
  dsm($vars, 'vars');
}

/**
 * 'default_formatter' callback, return themeable array.
 */
function Module_Plugin_property_default_formatter($property, $vars) {
  $entity = $vars['entity'];

  return array(
    '#markup' => strip_tags($entity->{$property}),
  );
}
