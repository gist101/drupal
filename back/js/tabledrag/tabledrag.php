<?php

// @api http://drupal7.api/api/drupal/includes%21common.inc/function/drupal_add_tabledrag/7.x

drupal_add_tabledrag($table_id, $action, $relationship, $group, $subgroup = NULL, $source = NULL, $hidden = TRUE, $limit = 0);




$output = theme('table', array('header' => $header, 'rows' => $rows, 'attributes' => array('id' => 'my-module-table')));
return $output;

$form['my_elements'][$delta]['weight']['#attributes']['class'] = array('my-elements-weight');


function package_dev_form($form, &$form_state) {
  $form = array();

  /*
  $form['package'] = array(
    '#type' => 'package',
    '#title' => t('Package'),
    '#default_value' => ''
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Submit',
  );
  */

  $form['pack']['#tree'] = TRUE;

  // Sample data
  $items = array();
  $items[] = array(
    'name' => 'A',
    'description' => 'This is A.',
  );
  $items[] = array(
    'name' => 'B',
    'description' => 'This is B.',
  );
  foreach ($items as $delta => $item) {
    $form['pack'][$delta] = array(
      'name' => array(
        '#markup' => check_plain($item['name']),
      ),
      'description' => array(
        '#type' => 'textfield',
        '#default_value' => check_plain($item['description']),
        '#size' => 20,
        '#maxlength' => 255,
      ),
      'weight' => array(
        '#type' => 'weight',
        '#title' => t('Weight'),
        '#default_value' => $delta,
        '#delta' => 10,
        '#title_display' => 'invisible',
      ),
    );
  }


  $form['add_item'] = array(
    '#type' => 'link',
    '#title' => t('Add item'),
    '#href' => 'package/dev/add-item',
    '#attributes' => array(
      'class' => array('button simple-dialog'),
      'rel' => array('width:900;resizable:false;position:[center,60]'),
    ),
  );

  ctools_add_js('package_dev', 'package_dev');

  return $form;
}

function package_dev_form_submit($form, &$form_state) {
  dsm($form);
  dsm($form_state);
}

/**
 *  Implements hook_theme().
 */
function package_dev_theme($existing, $type, $theme, $path) {
  return array(
    'package_dev_form' => array(
      'render element' => 'form',
    ),
  );
}

function theme_package_dev_form($variables) {
  $form = $variables['form'];
  $rows = array();
  foreach (element_children($form['pack']) as $id) {
    $form['pack'][$id]['weight']['#attributes']['class'] = array('pack-item-weight');
    $rows[] = array(
      'data' => array(
        drupal_render($form['pack'][$id]['name']),
        drupal_render($form['pack'][$id]['description']),
        drupal_render($form['pack'][$id]['weight']),
      ),
      'class' => array('draggable'),
    );
  }
  $header = array(t('Name'), t('Description'), t('Weight'));
  $table_id = 'pack-table';
  $output = theme('table', array(
    'header' => $header,
    'rows' => $rows,
    'attributes' => array('id' => $table_id),
  ));
  $output .= drupal_render_children($form);
  drupal_add_tabledrag($table_id, 'order', 'sibling', 'pack-item-weight');

  return $output;
}