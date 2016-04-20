<?php

text_format

Description: A text-format-enabled version of a textarea.

Properties: #access, #after_build, #ajax, #attributes, #cols (default: 60), #default_value, #description, #disabled, #element_validate, #parents, #post_render, #prefix, #pre_render, #process, #required, #resizable (default: TRUE), #rows (default: 5), #states, #suffix, #theme, #theme_wrappers, #title, #title_display, #tree,#type, #weight

Non-standard Properties:

//#format: the format to apply. If you want to use the default format, set this property to NULL in your form constructor function, and the filter system will handle the rest.
//#base_type (optional): defaults to 'textarea'. This makes it possible to also attach the text format selector to other form element types, such as textfields.
//Usage example (taxonomy.admin.inc):
$form['description'] = array(
  '#type' => 'text_format',
  '#title' => t('Description'),
  '#default_value' => $term->description,
  '#format' => $term->format,
  '#weight' => 0,
);
