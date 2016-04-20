<?php

/**
 * Defines the Node type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "node_type",
 *   label = @Translation("Content type"),
 *   handlers = {
 *     "access" = "Drupal\node\NodeTypeAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\node\NodeTypeForm",
 *       "edit" = "Drupal\node\NodeTypeForm",
 *       "delete" = "Drupal\node\Form\NodeTypeDeleteConfirm"
 *     },
 *     "list_builder" = "Drupal\node\NodeTypeListBuilder",
 *   },
 *   admin_permission = "administer content types",
 *   config_prefix = "type",
 *   bundle_of = "node",
 *   entity_keys = {
 *     "id" = "type",
 *     "label" = "name"
 *   },
 *   links = {
 *     "edit-form" = "/admin/structure/types/manage/{node_type}",
 *     "delete-form" = "/admin/structure/types/manage/{node_type}/delete",
 *     "collection" = "/admin/structure/types",
 *   },
 *   config_export = {
 *     "name",
 *     "type",
 *     "description",
 *     "help",
 *     "new_revision",
 *     "preview_mode",
 *     "display_submitted",
 *   }
 * )
 */
