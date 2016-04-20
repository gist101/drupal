<?php

// @doc http://drupal7.api/api/drupal/includes%21menu.inc/function/menu_navigation_links/7.x

menu_navigation_links($menu_name, $level = 0);

// -----------------------------------------------------------------------------
//

menu_main_menu();

function mt4dbtheme_preprocess_page(&$vars) {
  //dsm($vars);
  // Footer links
  $vars['menu_footer_links'] = menu_navigation_links('menu-footer-links');
  $variables = array(
    'links' => $vars['menu_footer_links'],
    'attributes' => array(
      'class' => array('inline-list links right')
    ),
  );
  $vars['footer_links'] = theme('links', $variables);
}

// main-menu links
dsm(menu_navigation_links('main-menu'));

