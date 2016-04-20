<?php

EntityType::loadAll();

// Entity type name
$eck_entity_type = $eck_entity_type_obj->name;

// Create new eck entity type in code.
$store_ent = new EntityType();
$store_ent->name = 'commerce_store';
$store_ent->label = 'Commerce Store';
$store_ent->addProperty('title', 'Title', 'text', 'title');
$store_ent->addProperty('uid', 'Owner User ID', 'positive_integer', 'author');
$store_ent->addProperty('created', 'Created', 'positive_integer', 'created');
$store_ent->addProperty('changed', 'Changed', 'positive_integer', 'changed');
$store_ent->save();

// Create new bundle for a eck entity type in code.
$bundle = new Bundle();
$bundle->name = 'store';
$bundle->label = 'Store';
$bundle->entity_type = 'commerce_store';
$bundle->save();
