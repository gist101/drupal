<?php

// -----------------------------------------------------------------------------
// Create

// -----------------------------------------------------------------------------
// Read

// -----------------------------------------------------------------------------
// Update

// -----------------------------------------------------------------------------
// Delete

entity_access($op, $entity_type, $entity = NULL, $account = NULL);

entity_save($entity_type, $entity);

entity_create($entity_type, $values);

entity_view($entity_type, $entities, $view_mode = 'full', $langcode = NULL, $page = NULL);

entity_uri($entity_type, $entity);

entity_label($entity_type, $entity);

entity_language($entity_type, $entity);

entity_delete($entity_type, $id);

entity_delete_multiple($entity_type, $ids);
