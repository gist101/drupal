<?php

// @qa http://drupal.stackexchange.com/questions/42563/how-to-use-custom-modal-with-ctools-and-triggered-by-a-button-form

$form['ajax_button'] = array(
  '#type' => 'button',
  '#value' => t('New Post'),
  '#attributes' => array('class' => array('ctools-use-modal','ctools-modal-slogan-style')),
  '#id' => 'hs-ajax-button',
);
