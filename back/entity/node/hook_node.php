<?php

// @file /modules/node/node.api.php
// @link https://api.drupal.org/api/drupal/modules%21node%21node.api.php/7

// @see node_save()
// @link https://api.drupal.org/api/drupal/modules%21node%21node.module/function/node_save/7




// =============================================================================
// Node Type

hook_node_info();
hook_node_type_insert();
hook_node_type_update();
hook_node_type_delete();


// =============================================================================
// Access Control

hook_node_access();
hook_node_access_records();
hook_node_access_records_alter();
hook_node_grants();
hook_node_grants_alter();


// =============================================================================
// Node Operations

// -----------------------------------------------------------------------------
// These are node-type-specific hooks, which are invoked only for the node type being affected.
// 'hook' is the node type name here.
// 'base' = 'node_content' by default, @see hook_node_info().

BASE_load();
BASE_view();
BASE_prepare();
BASE_form($node, &$form_state);
BASE_validate();
BASE_insert();
BASE_update();
BASE_delete();

// -----------------------------------------------------------------------------
// For any module to extend.

hook_node_operations();
hook_node_load();
hook_node_prepare(); // Act on a node object about to be shown on the add/edit form.
hook_node_view();
hook_node_view_alter();
hook_node_validate();
hook_node_submit();
hook_node_presave(); // Has no nid, vid.
hook_node_insert();
hook_node_update();
hook_node_update_index();
hook_node_delete();
hook_node_revision_delete();
hook_node_search_result();

// -----------------------------------------------------------------------------
// Others

hook_ranking();


// -----------------------------------------------------------------------------
// hook load sequence

hook_load();
hook_field_attach_load();
hook_entity_load();
hook_node_load();


