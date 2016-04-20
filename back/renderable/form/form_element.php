<?php

// @def Form element is a higher structure built on Drupal renderable element.
//   In fact, you can custom a new renderable element if you want a special process workflow.
//   Just give a builder, some unique callback properties. Then drupal_render().

// @doc http://drupal7.api/api/drupal/includes%21form.inc/function/form_builder/7.x


// =============================================================================
// Workflow
//
// #value_callback
// #process
// #after_build
// #pre_render
// #theme
// #theme_wrapper
// #post_render


// Additional information for basic element definition.



//
$element['#theme_wrappers'][] = 'form_element';
// @doc http://drupal7.api/api/drupal/includes%21form.inc/function/theme_form_element/7.x
theme_form_element();



// @see form_builder().
// @see _form_builder_handle_input_element().

$element = array(
  '#input' => TRUE,
  '#element_validate' => array(),
  '#process' => array(), // @see form_builder().
  '#value callback' => 'form_type_TYPE_value', // @default form_type_TYPE_value
  '#after_build' => array(),
);
