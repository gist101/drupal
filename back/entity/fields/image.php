<?php

// -----------------------------------------------------------------------------
// Field Type
// * image
// @see image_field_info().

dsm(image_field_info());


// -----------------------------------------------------------------------------
// Widget
// * image_image

dsm(image_field_widget_info());

// Widget Settings

// image_image
$settings = array(
  'progress_indicator' => 'throbber',
  'preview_image_style' => 'thumbnail',
);

// -----------------------------------------------------------------------------
// Formatter
// * image

dsm(image_field_formatter_info());


// =============================================================================
//

$filename = 'image.txt';
$image = file_get_contents('http://www.ibiblio.org/wm/paint/auth/gogh/gogh.white-house.jpg');
$file = file_save_data($image, 'public://' . $filename, FILE_EXISTS_RENAME);
$node->field_image = array(LANGUAGE_NONE => array('0' => (array)$file));


// -----------------------------------------------------------------------------
// Picture

/*
dsm(
field_view_value(KPANE_ENTITY, $entity, $field_name, $entity->{$field_name}['und'][0],
  array(
    'label' => 'hidden',
    'type' => 'picture',
    'settings' => $settings,
  )
)
);
dsm(
  field_view_field(KPANE_ENTITY, $entity,
    $field_name,
    array(
      'label' => 'hidden',
      'type' => 'picture',
      'settings' => $settings,
    )
  )
);
*/