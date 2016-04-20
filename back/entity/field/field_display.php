<?php

// -----------------------------------------------------------------------------
// Get field instance display settings.

// field_info_instance($entity_type, $field_name, $bundle_name)
// field_get_display($instance, $view_mode, $entity)

$instance = field_info_instance('node', 'body', 'test');
dsm($instance, 'instance');
$node = node_load(1);
$instance_display = field_get_display($instance, 'default', $node);
dsm($instance_display, 'instance_display');

