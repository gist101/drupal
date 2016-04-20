<?php

// @see og_ui_group_admin_overview().

// @api hook_og_ui_get_group_admin($group_type, $gid)
//   @example og_ui_og_ui_get_group_admin($group_type, $gid).
// @api hook_og_ui_get_group_admin_alter()

// -----------------------------------------------------------------------------
// hook_og_ui_get_group_admin($group_type, $gid)
//
// @see og_user_access().
// @see og_ui_add_users().
// @see og_set_breadcrumb().

/**
 * Implements hook_menu().
 */
function hook_menu() {
  $items = array();

  $items ['group/%/%/admin/people/add-user'] = array(
    'title' => 'Add members',
    'page callback' => 'drupal_get_form',
    'page arguments' => array('og_ui_add_users', 1, 2),
    'access callback' => 'og_ui_user_access_group',
    'access arguments' => array('add user', 1, 2),
    'file' => 'og_ui.admin.inc',
    'weight' => 5,
    'type' => MENU_LOCAL_TASK,
  );

  return $items;
}

/**
 * Implements hook_og_ui_get_group_admin().
 */
function hook_og_ui_get_group_admin($group_type, $gid) {
  $items = array();
  $default_access = og_is_group_default_access($group_type, $gid);

  if (og_user_access($group_type, $gid, 'add user')) {
    $items ['add_people'] = array(
      'title' => t('Add people'),
      'description' => t('Add group members.'),
      // The final URL will be "group/$group_type/$gid/admin/people/add-user".
      // @see og_ui_group_admin_overview().
      'href' => 'admin/people/add-user',
    );
  }

  return $items;
}

/**
 *
 */
function og_ui_add_users($form, &$form_state, $group_type, $gid) {
  og_set_breadcrumb($group_type, $gid, array(l(t('Group'), "$group_type/$gid/group")));
  $group = entity_load_single($group_type, $gid);
  $label = entity_label($group_type, $group);
  list(, , $bundle) = entity_extract_ids($group_type, $group);

  $form ['group_type'] = array('#type' => 'value', '#value' => $group_type);
  $form ['gid'] = array('#type' => 'value', '#value' => $gid);

  return $form;
}
