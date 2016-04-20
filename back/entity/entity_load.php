<?php

// -----------------------------------------------------------------------------
// Load multiple by IDs.
// Id as Key, stdClass or Entity object as value.

$entities = entity_load('dir_link', array(1, 2));
dsm($entities);


// -----------------------------------------------------------------------------
// Load single by ID.

entity_load_single($entity_type, $id);

// Directly load the DB version.
entity_load_unchanged($entity_type, $id);


// -----------------------------------------------------------------------------
// Load multiple by 'entity keys'['name'].

$entities = entity_load_multiple_by_name('test_name', array('baby'));
dsm($entities);


// -----------------------------------------------------------------------------
// Load multiple by property.

// entity_property_query($entity_type, $property, $value, $limit = 30);

$entities = entity_property_query('test_name', 'name', 'baby');
dsm($entities); // Array of entity ids.

// -----------------------------------------------------------------------------
// Entity Load Hook.

hook_entity_load(&$queried_entities, $entity_type);

// @see DrupalDefaultEntityController::attachLoad().
$load_hook = "hook_{$entity_info['load hook']}";
$load_hook($args);
