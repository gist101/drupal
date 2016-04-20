<?php

/**
 * @file
 * Plugin to provide access control based upon pubform status.
 */

/**
 * ctools access plugin for album, video, publish pubform.
 */
$plugin = array(
  'title' => t("Miiniu pubform apply status"),
  'description' => t('Control access by pubform status.'),
  'callback' => 'miiniu_pubform_apply_access',
  'default' => array('type' => 'update'),
  'settings form' => 'miiniu_pubform_apply_form',
  'required context' => new ctools_context_required(t('Node'), 'node'),
);

/**
 * Access check from the status of related pubform.
 *
 * @todo Redirect the user.
 */
function miiniu_pubform_apply_access($conf, $context) {
  $node = $context->data;
  list($id, $vid, $bundle) = entity_extract_ids('node', $node);
  if ($conf['type'] == 'new') {
    $pubform = miiniu_pub_publish_pubform($node, $conf['type']);
    // Allow new apply submit if not exist or has old reject.
    if (!isset($pubform)) {
      return TRUE;
    }
    else {
      $pubfrom_wrapper = entity_metadata_wrapper('entityform', $pubform);
      if ($pubfrom_wrapper->field_pubform_status->value() == 'reject') {
        return TRUE;
      }
    }
  }
  else if ($conf['type'] == 'update') {
    $pubform_new = miiniu_pub_publish_pubform($node, 'new');
    // Allow update apply submit if new apply get accepted and no opening update apply.
    if ($pubform_new) {
      $pubfrom_new_wrapper = entity_metadata_wrapper('entityform', $pubform_new);
      if ($pubfrom_new_wrapper->field_pubform_status->value() != 'accept') {
        return FALSE;
      }
      $pubform_update = miiniu_pub_publish_pubform($node, 'update');
      if (!isset($pubform_update)) {
        return TRUE;
      }
      else {
        $pubfrom_update_wrapper = entity_metadata_wrapper('entityform', $pubform_update);
        if (in_array($pubfrom_update_wrapper->field_pubform_status->value(), array('accept', 'reject'))) {
          return TRUE;
        }
      }
    }
  }

  return FALSE;
}

function miiniu_pubform_apply_form($form, &$form_state, $conf) {
  $types = array(
    'new' => t('New'),
    'update' => t('Update'),
  );
  $form['settings']['type'] = array(
    '#type' => 'select',
    '#title' => t('Pubform type'),
    '#options' => $types,
    '#default_value' => $conf['type'],
  );

  return $form;
}
