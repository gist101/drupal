<?php

// @doc http://drupal.stackexchange.com/questions/20192/how-do-i-render-a-field-value-including-its-format

// @api http://drupal7.api/api/drupal/modules%21field%21field.module/function/field_view_field/7.x
// @api http://drupal7.api/api/drupal/modules%21field%21field.module/function/field_view_value/7.x

// @see field_default_view().
// It explains the default properties contained in field elements.

// Full wrapper markup
field_view_field($entity_type, $entity, $field_name, $display = array(), $langcode = NULL);

// No wrapper markup
field_view_value($entity_type, $entity, $field_name, $item, $display = array(), $langcode = NULL);

// Template
// <?php print render($field); ?>

$lang = entity_language('fieldable_panels_pane', $entity);
$vars['quote'] = field_view_value('fieldable_panels_pane', $entity, 'field_pane_quote_body',
$entity->field_pane_quote_body[$lang][0],
array('lable' => 'hidden')
);


// Workflow
// field_attach_prepare_view()
//   hook_field_prepare_view()
//   hook_field_formatter_prepare_view()
