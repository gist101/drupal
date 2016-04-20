<?php

// Extract information
list($id, $vid, $bundle) = entity_extract_ids($entity_type, $entity);

//
$uri = entity_uri($entity_type, $entity);
// Output
$uri = array(
  'path' => 'node/11',
  'options' => array(
    'entity_type' => $entity_type,
    'entity' => $entity,
  ),
);

//
$uri = entity_uri('node', node_load(7));
dsm($uri);
$path_alias = drupal_get_path_alias($uri['path']);
dsm($path_alias);


// Return array of entities by query property
entity_property_query($entity_type, $property, $value, $limit = 30);


// Converts an array of entities to be keyed by the values of a given property.
entity_key_array_by_property(array $entities, $property);


// Creation
entity_property_values_create_entity($entity_type, $values = array());

