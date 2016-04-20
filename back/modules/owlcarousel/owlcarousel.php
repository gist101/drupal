<?php

// @link http://owlgraphic.com/owlcarousel/index.html
// @issue Chrome compatible issue
//  http://stackoverflow.com/questions/25153801/owl-carousel-transitions-effect-not-working-after-chrome-latest-update-v36


// Theme registry
// * owlcarousel
// * owlcarousel_list

$variables = array(
  'items' => array(), // keyed or numeric array with 'row' to represent the true item value
  'settings' => array(
    'instance' => '', // instance preset
    'attributes' => array(
      'id' => array('default' => $html_id), // html id
    ),
  ),
);


function owlcarousel_theme_example() {
  $items_group = FALSE;
  $settings_group = array(
    'instance'   => $settings['settings_group'],
    'attributes' => array(
      'id' => array(
        'default' => drupal_html_id('owlcarousel_fields_' . $instance['id'])
      ),
    ),
  );

  $items_group[]['row'] = theme('image_style', $vars);

  if ($items_group) {
    $element = array(
      '#theme'    => 'owlcarousel',
      '#items'    => $items_group,
      '#settings' => $settings_group,
    );
  }
}

function owlcarousel_theme_wrapper_example($rows, $instance = NULL, $id = NULL) {

}

// -----------------------------------------------------------------------------
// Example

function kpane_kpane_posts_slideshow_owlcarousel($posts, $entity) {
  $items_group = FALSE;
  $settings_group = array(
    'instance' => 'owlcarousel_settings_kpane-single',
    'attributes' => array(
      'id' => array(
        'default' => drupal_html_id('owlcarousel_posts')
      ),
    ),
  );

  foreach ($posts as $post) {
    if ($post['access']) {
      $items_group[]['row'] = kpane_kpane_posts_slideshow_owlcarousel_item($post['entity'], $entity);
    }
  }


  $element = NULL;
  if ($items_group) {
    $element = array(
      '#theme' => 'owlcarousel',
      '#items' => $items_group,
      '#settings' => $settings_group,
    );
  }

  return $element;
}

function kpane_kpane_posts_slideshow_owlcarousel_item($post, $entity) {
  $output = '';

  //$output .= '<li>';

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


  //$output .= '</li>';

  return $output;
}
