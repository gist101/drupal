<?php

// @see _form_builder_handle_input_element().
// @see _form_element_triggered_scripted_submission().
// @see _form_button_was_clicked().

/**
 * Helper function to get the element for ajax callback.
 */
function uiid_form_get_element($form, $form_state) {
  $array_parents = $form_state['triggering_element']['#array_parents'];
  // Remove the 'generate'.
  $array_parents = array_slice($array_parents, 0, -1);
  $element = drupal_array_get_nested_value($form, $array_parents);

  return $element;
}
