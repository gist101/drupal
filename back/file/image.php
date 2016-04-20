<?php

// This will regenerate all of that image's styles.
// Can do it before node_save().
image_path_flush($node->field_image['und'][0]['uri']);

// Theme functions in image.module.
// theme_image_style().
$theme_registry['image_style'] = array(
  'variables' => array(
    'style_name' => NULL,
    'path' => NULL,
    'width' => NULL,
    'height' => NULL,
    'alt' => '',
    'title' => NULL,
    'attributes' => array(),
  ),
);
