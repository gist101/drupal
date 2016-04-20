<?php

// @see http://drupal7.api/api/entity/includes%21entity.inc/class/Entity/7.x-1.x

// Important notes.
/*
- Object return from node_load(), entity_load_single() is stdClass object.
*/

$entity = new Entity();

// Get numberic id
$entity->internalIdentifier();

// Get name or id
$entity->identifier();

// Get entity type name
$entity->entityType();

// Get bundle name
$entity->bundle();

// -----------------------------------------------------------------------------
// Wrap core StdClass object.

$node = node_load(1);
dsm($node);
$node_entity = new Entity((array) $node, 'node');
dsm($node_entity);
