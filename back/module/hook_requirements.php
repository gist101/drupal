<?php

/**
 * Implements hook_requirements()
 */
function json2_requirements($phase) {
  $requirements = array();
  if ($phase == 'runtime') {
    $t = get_t();
    if ($path = libraries_get_path('json2')) {
      if (file_exists($path . '/json2.js')) {
        $requirements['json2'] = array(
          'title' => $t('JSON2'),
          'value' => $t('json2.js found under !path', array('!path' => $path . '/json2.js')),
          'severity' => REQUIREMENT_OK,
        );
        return $requirements;
      }
    }
    $requirements['json2'] = array(
      'title' => $t('JSON2'),
      'value' => isset($lib['error message']) ? $t($lib['error message']) : t('JSON2 library was not found. !download the library and place in under sites/all/libraries/json2, so that the library can be found at sites/all/libraries/json2/json2.js.', array('!download' => l(t('Download'), 'https://github.com/douglascrockford/JSON-js/blob/master/json2.js'))),
      'severity' => REQUIREMENT_ERROR,
    );
  }
  return $requirements;
}