<?php

// @doc http://drupal7.api/api/views/views.api.php/function/hook_views_plugins/7.x-3.x
// @howto http://www.monarchdigital.com/blog/2011-10-07/creating-drupal-views-style-for-a-timeline

$style_definition = array(
  'title'           => t(''),
  'help'            => t(''),
  'handler'         => 'views_plugin_style_',
  'parent'          => 'default',
  'theme'           => '',
  'theme path'      => '',
  'theme file'      => 'theme.inc',
  'uses row plugin' => TRUE,
  'uses row class'  => TRUE,
  'uses grouping'   => FALSE,
  'uses options'    => TRUE,
  'uses fields'     => FALSE,
  'type'            => 'normal',
  'js'              => array(),
  //'help topic'      => '',
  'even empty'      => TRUE,
);

// Simple
$style_definition = array(
  'title'           => t(''),
  'help'            => t(''),
  'handler'         => 'views_plugin_style_',
  'theme'           => '',
  'uses row plugin' => TRUE,
  'uses fields'     => FALSE,
  'uses grouping'   => FALSE,
  'uses options'    => TRUE,
  'type'            => 'normal',
);

/**
 * Implements hook_views_plugins().
 */
function views_bootstrap_views_plugins() {
  $module_path = drupal_get_path('module', 'views_bootstrap');

  return array(
    'style' => array(
      'views_bootstrap_carousel_plugin_style' => array(
        'title' => t('Bootstrap Carousel'),
        'help' => t('Bootstrap Carousel Style'),
        'path' => $module_path . '/plugins/carousel',
        'handler' => 'ViewsBootstrapCarouselPluginStyle',
        'parent' => 'default',
        'theme' => 'views_bootstrap_carousel_plugin_style',
        'theme path' => $module_path . '/templates/carousel',
        'theme file' => 'theme.inc',
        'uses row plugin' => TRUE,
        'uses grouping' => FALSE,
        'uses options' => TRUE,
        'type' => 'normal',
        //@TODO:  'uses row plugin' => FALSE, 'uses fields' => TRUE,
    ),
  );
}

// =============================================================================
// Example: http://www.monarchdigital.com/blog/2011-10-07/creating-drupal-views-style-for-a-timeline

/**
 * Implements of hook_views_plugins(). Adds a view style to views UI interface.
 */
function simple_timeline_views_plugins() {
  return array(
    'style' => array(
      'timeline' => array(
        'title'        => t('Simple Timeline'),
        'help'         => t('Displays content on a timeline'),
        'handler'      => 'views_plugin_style_simple_timeline',
        'theme'        => 'views_view_timeline',
        'uses fields'  => TRUE,
        'uses options' => TRUE,
        'type'         => 'normal',
        'even empty'   => TRUE,
      ),
    ),
  );
}

/** * Timeline style plugin that structures the results in the form of a single linear time line. * * @ingroup views_style_plugins */
class views_plugin_style_simple_timeline extends views_plugin_style {
  /** * Set default options */
  // @deprecated, use option_definition() instead.
  function options(&$options) {
    $options['height'] = array('default' => '300px');
    $options['width'] = array('default' => '100%');
    $options['title_main'] = array('default' => 'My Timeline');

    return $options; // Not necessary to return or pass by reference? Users call on what they want to do
  }

  /**
   * Create forms to hold these values allowing the user to change the values
   */
  function options_form(&$form, &$form_state) {
    $form['height'] = array(
      '#type'          => 'textfield',
      '#title'         => t('Height'),
      '#size'          => '30',
      '#description'   => t('This field determines how tall the timeline will be'),
      '#default_value' => $this->options['height'],
    );
    $form['width'] = array(
      '#type'          => 'textfield',
      '#title'         => t('Width'),
      '#size'          => '30',
      '#description'   => t('This field determines how wide the timeline will be'),
      '#default_value' => $this->options['width'],
    );
    $form['title_main'] = array(
      '#type'          => 'textfield',
      '#title'         => t('Main Title'),
      '#size'          => '30',
      '#description'   => t('Uses the larger title font on the timeline'),
      '#default_value' => $this->options['title_main'],
    );
  }

}

/** * Implementation of template_process for views-view-simple-timeline.tpl.php. */
function template_preprocess_views_view_timeline(&$vars) {
  $vars['height'] = $vars['options']['height'];
  $vars['width'] = $vars['options']['width'];
  $vars['main_title'] = $vars['options']['title_main'];
  // Other variables can be obtained. Try doing a dpm() on $vars. If you say what is dpm(), you need the devel module!!!
  $vars['display'] = $vars['view']->current_display;
}


