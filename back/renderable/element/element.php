<?php

// '#' item is a variable.
// Item that doesn't start with '#' is a child element.

$element = array(
  '#markup' => '',
);

// @see drupal_render().
$element = array(
  '#printed' => FALSE,
  '#cache' => array(),
  '#pre_render' => array(), // To whole element
  '#children' => array(), // The output
  '#theme' => '', // Set it means it's used to theme whole element, not set means children will be themed individually.
  '#theme_wrappers' => array(),
  '#post_render' => array(), // To children and whole element
  '#states' => array(), // drupal_process_attached()
  '#attached' => array(), // drupal_process_attached()
  '#prefix' => '', // Prefix to #children
  '#suffix' => '', // Suffix to #children
);

// @see element_children().
$element = array(
  '#sorted' => FALSE,
  '#weight' => 0,
);

$element = array(
  '#attributes' => array(),
);

// -----------------------------------------------------------------------------
// Utility

element_child($key);
element_children(&$elements, $sort = FALSE);

element_set_attributes(array &$element, array $map);


