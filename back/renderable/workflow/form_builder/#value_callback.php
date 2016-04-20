<?php

// @see _form_builder_handle_input_element().
// @see form_set_value().

// It prepares the $element['#value'].

// It will set $form['example']['#value'] anyway, but consider #tree
// Consider #tree

// $element['#value_callback']()
// or
// form_type_{$element['#type']}_value()

$value_callback = !empty($element['#value_callback']) ? $element['#value_callback'] : 'form_type_' . $element['#type'] . '_value';

// It need to return value that match the element structure.
function form_type_example_value($element, $input = FALSE) {

}

function form_type_example_value($element, $input = FALSE, &$form_state) {

}
