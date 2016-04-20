<?php

$info = module_invoke_all('element_info');

$info = element_info($type);

$properties = element_properties($element);

$property_value = element_info_property($type, $property_name, $default = NULL);

