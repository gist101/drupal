<?php

// -----------------------------------------------------------------------------
// theme('picture') Usage

$group_name = 'bootstrap_4_1';
$fallback_image_style = '';
$mappings = picture_mapping_load($group_name);
$breakpoint_styles = picture_get_mapping_breakpoints($mappings, $fallback_image_style);
$vars = array(
  'uri' => $post->kpost_image[LANGUAGE_NONE][0]['uri'],
  'breakpoints' => $breakpoint_styles,
);
$output .= theme('picture', $vars);
