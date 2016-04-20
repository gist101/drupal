<?php

function eck_pane_content_type_add_form($form, &$form_state) {
  dpm($form, '$form');
  dpm($form_state, '$form_state');
  return $form;
}

$form_state = array(
  'display' => '',
  'contexts' => '',
  'pane' => '', // The pane object
  'plugin' => '',
  'subtype' => '',
  'subtype_name' => '',
  'conf' => '',
  'op' => '',
  'step' => '',
  'form_info' => '',
);

// -----------------------------------------------------------------------------
// 'edit form'
//

$plugin['edit form'] = array(
  'MODULE_PLUGIN_content_type_step1' => array(
    'default' => TRUE,
    'title' => t('Step 1'),
  ),
  'MODULE_PLUGIN_content_type_step2' => t('Step 2'),
);

function MODULE_PLUGIN_content_type_step1($form, &$form_state) {

  // @debug
  dpm($form, '$form');
  dpm($form_state, '$form_state');

  // If want to remove 'Override title'
  unset($form['override_title']);
  unset($form['override_title_text']);
  unset($form['override_title_markup']);

  return $form;
}

function MODULE_PLUGIN_content_type_step2($form, &$form_state) {

  // @debug
  dpm($form_state['conf']);


  $context = $form_state['contexts'][$form_state['conf']['context']];
  $entity_type = $context->keyword;
  $entity = $context->data;
}

