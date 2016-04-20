<?php

// -----------------------------------------------------------------------------
// $plugin
// @ref What calls eck_property_behavior_invoke_plugin()
// @ref What calls eck_property_behavior_invoke_plugin_alter()
// @ref What calls eck_property_behavior_implements()


// File comment
/**
 * @file
 * ECK property_behavior: PluginName
 */

// All
$plugin = array(
	'label' => t(''), // @required
  'unique' => FALSE, // @optional Default FALSE.
  // Callbacks @ref What calls eck_property_behavior_invoke_plugin()
  'entity_info' => '',
  'entity_view' => '',
  'entity_insert' => '', // ??? Does this work?
  'entity_save' => '', // Mimic: entity_insert. Origin: Hook to hook_entity_presave().
  'entity_update' => '',
  'entity_delete' => '',
  // 
  'default_widget' => '',
  'default_formatter' => '', // @see eck__entity__view().
  'pre_set' => '', // @see eck__entity__form_submit().
  // Callbacks @ref What calls eck_property_behavior_invoke_plugin_alter()
  'property_info' => '',
  'getter' => '', // @optional @see eck_property_behavior_getter().
  'setter'> '', // @optional @see eck_property_behavior_setter().
  'validation' => '', // @optional @see eck_property_behavior_validation().
  'views_data_alter' => '',
  // The bundle edit form
  'bundle_form' => '',
);

// Simplest implementation
$plugin = array(
  'label' => t(''),
);

// Simple implementation
$plugin = array(
  'label' => t(''),
  'default_widget' => 'Module_Plugin_property_default_widget',
  'default_formatter' => 'Module_Plugin_property_default_formatter',
);

// -----------------------------------------------------------------------------
// $plugin callbacks

$callback($property, $vars);

// Default $vars, simple usage.
$entity = $vars['entity'];
$entity->{$property};

// -------------
// 'entity_info'

function eck_extras_name_property_entity_info($property, $vars) {
  $info = $vars;

  $info['entity keys']['name'] = $property;

  return $info;
}

// -------------
// 'entity_save'

// Example from usin.inc
function eck_extras_usin_property_entity_save($property, $vars) {
  $entity = $vars['entity'];
  
  if (empty($entity->{$property})) {
    $bundle_config = eck_extras_get_bundle_config($entity->entityType(), $entity->type);
    $url_property = eck_extras_entity_get_properties($entity, 'url', TRUE);
    $url = $entity->{$url_property};
    if (!empty($url)) {
      $entity->{$property} = eck_extras_url_fetch_title($url);
    }
  }
}

// ----------------
// 'default_widget'
//
// @see eck__entity__form().

$vars = array(
	'entity', // Entity
	// From entity_get_property_info().
  'properties',
  'entity_type',
);

// Get property label, it's very good for title.
$vars['properties'][$property]['label'];

// --------
// 'setter'
//
// @see eck_entity_property_info_alter().
// @see eck_property_behavior_setter().
// @see entity_property_verbatim_set().
//   entity_property_verbatim_set(&$data, $name, $value, $langcode, $type, $info).
// @see entity_metadata_field_property_set().

$vars = array(
	'entity',
  'value',
);

/**
 * Sets the property to the given value. May be used as 'setter callback'.
 */
function entity_property_verbatim_set(&$data, $name, $value, $langcode, $type, $info) {
  $name = isset($info['schema field']) ? $info['schema field'] : $name;
  if (is_array($data) || (is_object($data) && $data instanceof ArrayAccess)) {
    $data[$name] = $value;
  }
  elseif (is_object($data)) {
    $data->$name = $value;
  }
}

/**
 * Getter callback to load the 'entity' or 'group' property from OG membership.
 *
 * We have to return the entity wrapped.
 */
function og_entity_getter($object, array $options, $property_name) {
  switch ($property_name) {
  	case 'entity':
  	  return entity_metadata_wrapper($object->entity_type, $object->etid);
  	case 'group':
  	  return entity_metadata_wrapper($object->group_type, $object->gid);
  }
}

/**
 * Entity property info setter callback to set the "entity" property for groups
 * and memberships.
 *
 * As the property is of type entity, the value will be passed as a wrapped
 * entity.
 */
function og_entity_setter($object, $property_name, $wrapper) {
  switch ($property_name) {
  	case 'entity':
  	  $object->entity_type = $wrapper->type();
  	  $object->etid = $wrapper->getIdentifier();
  	  break;
  	case 'group':
  	  $object->group_type = $wrapper->type();
  	  $object->gid = $wrapper->getIdentifier();
  	  break;
  }
}

// ---------------
// 'property_info'
//
// @see eck_entity_property_info_alter().

$vars = entity_get_property_info();
$vars = array(
	'properties' => array(),
  'entity_type',
);
