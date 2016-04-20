<?php

// @link http://www.phase2technology.com/blog/setting-the-allowed-values-function-property-on-text-fields/
// This tutorial teach how to set 'allowed_values_function'.

$default_sports_field = field_info_field('field_default_sports'); // machine name of field
unset($default_sports_field['settings']['allowed_values']); // having this set interferes with the allowed_values_function value
$default_sports_field['settings']['allowed_values_function'] = 'my_module_default_sports_list'; // function name that provides array of values
field_update_field($default_sports_field);
