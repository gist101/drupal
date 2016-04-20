<?php

// Integrate 'image', 'image_style', 'picture'.

// Current $variables
/*
$vars = array(
  'type' => 'image',
  'fid' => 0,
  'path' => '',
  'width' => '',
  'height' => '',
  'alt' => '',
  'title' => '',
  'attributes' => '',
  // image_style
  'style_name' => '',
  'link' => array(
    'path' => '',
    'language' => '',
    'attributes' => array(),
  ),
  // picture
  'picture' => array(
    'picture_mapping' => '',
    'fallback_image_style' => '',
    'attributes' => array(),
  ),
  // Responsive to parent
  'responsive' => TRUE,
);
*/

// =============================================================================
// Cookbook

// Simplest
// It will render file:1 as thumbnail.
theme('kore_image', array('fid' => 1));
