<?php

//textarea

//Description: Format a multiple-line text field.

//Properties: #access, #after_build, #ajax, #attributes, #cols (default: 60), #default_value, #description, #disabled, #element_validate, #field_prefix, #field_suffix, #parents, #post_render, #prefix, #pre_render, #process, #required, #resizable (default: TRUE), #rows (default: 5), #states, #suffix, #theme, #theme_wrappers, #title, #title_display, #tree, #type, #weight

//Usage example (comment.module):
$form['keywords'] = array(
  '#title' => t('Keywords'),
  '#type' => 'textarea',
  '#description' => t('The comment will be unpublished if it contains any of the phrases above. Use a case-sensitive, comma-separated list of phrases. Example: funny, bungee jumping, "Company, Inc."'),
  '#default_value' => isset(  $context['keywords']) ? drupal_implode_tags($context['keywords']) : '',
);
