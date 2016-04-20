<?php

// @link http://drupal7.api:8082/api/drupal/developer%21topics%21forms_api_reference.html/7.x#textfield

//textfield

//Description: Format a single-line text field.

//Properties: #access, #after_build, #ajax, #attributes, #autocomplete_path (default: FALSE), #default_value, #description, #disabled, #element_validate, #field_prefix, #field_suffix, #maxlength (default: 128), #parents, #post_render, #prefix, #pre_render, #process, #required, #size (default: 60), #states, #suffix, #text_format, #theme, #theme_wrappers, #title, #title_display, #tree, #type, #weight

//Usage example (forum.module):
$form['title'] = array(
  '#type' => 'textfield',
  '#title' => t('Subject'),
  '#default_value' => $node->title,
  '#size' => 60,
  '#maxlength' => 128,
  '#required' => TRUE,
);

function ajax_example_simple_autocomplete($form, &$form_state) {

  $form['info'] = array(
    '#markup' => '<div>' . t("This example does a simplest possible autocomplete by username. You'll need a few users on your system for it to make sense.") . '</div>',
  );

  $form['user'] = array(
    '#type' => 'textfield',
    '#title' => t('Choose a user (or a people, depending on your usage preference)'),
    // The autocomplete path is provided in hook_menu in ajax_example.module.
    '#autocomplete_path' => 'examples/ajax_example/simple_user_autocomplete_callback',
  );

  return $form;
}

