<?php

/**
 * Implements hook_toolbar_alter().
 */
function ko_define_toolbar_alter(&$items) {
  $items['ko']['tray']['define'] = [
    '#theme' => 'links',
    '#links' => [
      'glossary' => [
        'title' => t('Glossary'),
        'url' => Url::fromUri('base://admin/content/glossary'),
      ],
    ],
  ];
}