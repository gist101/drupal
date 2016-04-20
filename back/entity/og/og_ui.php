<?php

// ============================================================================
// Hooks

// ----------------------------------------------------------------------------
// Add a new admin settings item to a group entity.
// 1. Add a permission(s) for access checking.
// 2. Add the URL to visit.
// 3. Use 'group/%/%/[href]' in hook_menu().

/**
 * Implements hook_og_permissions().
 */
function og_serial_og_permission() {
  $permissions = array(
    'administer serial' => array(
      'title' => t('Administer group content serial number counter.'),
    ),
  );
  return $permissions;
}

/**
 * Implements hook_og_ui_get_group_admin()
 */
function og_serial_og_ui_get_group_admin($group_type, $gid) {
  $items = array();
  if (og_user_access($group_type, $gid, 'administer serial')) {
    $items['serial'] = array(
      'title' => t('Serial'),
      'description' => t('Show serial counter related to this group.'),
      'href' => 'admin/serial',
    );
  }

  return $items;
}

/**
 * Implements hook_menu().
 */
function og_serial_menu() {
  $items = array();
  $items['group/%/%/admin/serial'] = array(
    'title' => 'Serial',
    'description' => 'Manage group content serial number.',
    'page callback' => 'og_serial_overview_page',
    'file' => 'og_serial.admin.inc',
    'access callback' => TRUE,
  );

  return $items;
}
