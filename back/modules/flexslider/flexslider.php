<?php

// @file flexslider.api.php
flexslider_add('my_image_list', 'default');
flexslider_add('my_image_list');
flexslider_add();

// =============================================================================
// Example

function kpane_kpane_posts_slideshow_flexslide($posts, $entity) {
  flexslider_add('flexslider', 'default');

  $output  = '<div id="flexslider">';
  $output .= '<ul class="slides">';

  foreach ($posts as $post) {
    if ($post['access']) {
      $output .= kpane_kpane_posts_slideshow_flexslide_item($post['entity'], $entity);
    }
  }

  $output .= '</ul>';
  $output .= '</div>';

  return $output;
}

function kpane_kpane_posts_slideshow_flexslide_item($post, $entity) {
  $output = '';

  $output .= '<li>';

  $bundle = $entity->bundle;
  $settings = $entity->settings[$bundle];
  kore_include('picture');
  $picture_mapping = $settings['picture']['picture_mapping'];
  $fallback_image_style = $settings['picture']['fallback_image_style'];
  $options = array(
    'attributes' => array(
      'class' => 'img-responsive',
    ),
  );
  $output .= kore_picture_theme_image($post->kpost_image[LANGUAGE_NONE][0]['uri'], $picture_mapping, $fallback_image_style, $options);


  $output .= '</li>';

  return $output;
}
