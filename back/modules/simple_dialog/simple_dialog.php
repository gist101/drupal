<?php

$items['package/dev/add-item'] = array(
  'title' => 'Add item to the package',
  'description' => '',
  'page callback' => 'package_dev_add_item_page',
  'page arguments' => array(),
  'access arguments' => array('access content'),
);

$form['add_item'] = array(
  '#type' => 'link',
  '#title' => t('Add item'),
  '#href' => 'package/dev/add-item',
  '#attributes' => array(
    'class' => array('button simple-dialog'),
    'rel' => array('width:900;resizable:false;position:[center,60]'),
  ),
);

function package_dev_add_item_page() {
  $output = <<<EOT
<div id="dialog-form" title="Create new user">
  <p class="validateTips">All form fields are required.</p>

  <form>
      <input type="checkbox" name="package" value="File1">File1
      <br>
      <input type="checkbox" name="package" value="File2">File2
      <br>
      <input type="checkbox" name="package" value="File3">File3
      <br>

      <input type="submit" value="Save">
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
  </form>
</div>
EOT;

  return $output;
}