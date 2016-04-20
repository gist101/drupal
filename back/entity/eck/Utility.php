<?php

/**
 * Helper function to get the entity types of eck module.
 */
function eck_extras_get_entity_types() {
  $eck_entity_types = &drupal_static(__FUNCTION__, array());
  if (count($eck_entity_types) == 0) {
    foreach (EntityType::loadAll() as $eck_entity_type) {
      foreach (Bundle::loadByEntityType($eck_entity_type) as $eck_bundle) {
        $eck_entity_types[$eck_entity_type->name][] = $eck_bundle->name;
      }
    }
  }

  return $eck_entity_types;
}

$properties_plugin_info = ctools_get_plugins('eck', 'property_behavior');
foreach (EntityType::loadByName($eck_entity_type)->properties as $property_name => $property) {
  
}


bundle::loadByMachineName("{$eck_entity_type}_{$eck_bundle}")->config;

// Get entity properties
