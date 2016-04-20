<?php

menu_get_item($path = NULL, $router_item = NULL);

hook_menu_get_item_alter(&$router_item, $path, $original_map);

// @api http://drupal7.api/api/drupal/includes%21menu.inc/function/menu_get_object/7.x
menu_get_object($type = 'node', $position = 1, $path = NULL);

