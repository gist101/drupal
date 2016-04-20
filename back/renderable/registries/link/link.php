<?php

// @see theme_link()
// @see drupal_pre_render_link()

$result[$delta] = array(
  '#type' => 'link',
  '#title' => $product->title,
  '#href' => 'dp/' . $item['product_id'],
  // @todo Just a temporary solution.
  '#options' => array(
    'attributes' => array(
      'class' => array('button'),
    ),
  ),
);