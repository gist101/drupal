<?php

$classes_entity_type = kore_component_entity_get_classes('Field_Form', 'node');
$classes_bundle = kore_component_entity_get_classes('Field_Form', 'node', 'test');
$result  = kore_array_override($classes_entity_type, $classes_bundle);
dsm($classes_entity_type);
dsm($classes_bundle);
dsm($result);

