<?php

//select

//Description: Format a drop-down menu or scrolling selection box. See #empty_option and #empty_value for an explanation of various settings for a select element, including behavior if #required is TRUE or FALSE.

//Properties: #access, #after_build, #ajax, #attributes, #default_value, #description, #disabled, #element_validate, #empty_option, #empty_value, #field_prefix, #field_suffix, #multiple, #options, #parents, #post_render, #prefix, #pre_render, #process, #required, #size, #states, #suffix, #theme, #theme_wrappers, #title, #title_display, #tree, #type, #weight

//Usage example (contact.admin.inc):


$form['selected'] = array(
  '#type' => 'select',
  '#title' => t('Selected'),
  '#description' => t('Set this to <em>Yes</em> if you would like this category to be selected by default.'),
  '#options' => array(
    0 => t('No'),
    1 => t('Yes'),
  ),
  '#default_value' => $category['selected'],
);
