<?php

// Base for <input> form element.

$element['generate'] = array(
  '#type' => 'button',
  '#name' => $id . '-generate',
  '#value' => t('Generate'),
  '#ajax' => array(
    'callback' => 'uiid_generate_ajax',
    'wrapper' => $id,
  ),
  '#limit_validation_errors' => array(),
);

/**
 * Ajax callback.
 */
function uiid_generate_ajax($form, $form_state) {
  $element = uiid_form_get_element($form, $form_state);
  if (function_exists($element['#uiid']['generate_callback'])) {
    $generate_callback = $element['#uiid']['generate_callback'];
  }
  else {
    $generate_callback = 'uiid_generate';
  }
  $element['value']['#value'] = $generate_callback($element, $form_state);
  // @todo Limit tries times, then set error.
  while (!uiid_unique($element, $form_state)) {
    $element['value']['#value'] = $generate_callback($element, $form_state);
  }

  return $element['value'];
}

/**
 * Helper function to get the element for ajax callback.
 */
function uiid_form_get_element($form, $form_state) {
  $element = array();
  $array_parents = $form_state['triggering_element']['#array_parents'];
  // Remove the 'generate'.
  $array_parents = array_slice($array_parents, 0, -1);
  $element = drupal_array_get_nested_value($form, $array_parents);

  return $element;
}
