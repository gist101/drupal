<?php

$vars = array(
  // required
  'text' => 'My Link Text',
  'path' => 'path/to/target/page/to/load',
  'selector' => 'id-of-element-on-target-page-to-load',
  'title' => 'Modal Frame Title',
  // optional
  'options' => array(
    'optionName' => 'optionValue', // examples:
    'width' => 900,
    'resizable' => FALSE,
    'position' => 'center', // Position can be a string or:
    'position' => array(60, 'top') // can be an array of xy values
  ),
  'class' => array('class-name-1', 'class-name-2'),
);

theme('simple_dialog_link', $vars);
