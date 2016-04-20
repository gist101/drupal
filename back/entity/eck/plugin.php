<?php

// Utility

eck_property_behavior_implements($entity_type, $property, $function_name);

// Add in custom plugin callback

eck_property_behavior_invoke_plugin($entity_type, $function_name, $all = array(), $specific = array());

eck_property_behavior_invoke_plugin_alter($entity_type, $function_name, $var);

