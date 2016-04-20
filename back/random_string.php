<?php


function random_string_test() {
  $time_start = time();
  
  for ($i = 0; $i < 1000000; $i++) {
    random_string_1(10);
  }
  
  $time_end = time();

  echo 'Time cost: ' . ($time_end - $time_start) . '.';
}

/**
 * Generate a random string used chars provided by source.
 *
 * @param string $src
 *   Source characters.
 * @param int $len
 *   Length of the return random string.
 * @return string
 */
function random_string($src, $len) {
  $ret = '';
  $rand_max = strlen($src);
  for ($i = 0; $i < $len; $i++) {
    $ret .= $src[mt_rand(0, $rand_max)];
  }

  return $ret;
}

function random_string_1($len = 10) {
  $source = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  $result = '';
  for ($i = 0; $i < $len; $i++) {
    $result .= $source[mt_rand(0, strlen($source) - 1)];
  }

  return $result;
}

function random_string_2($len = 10) {
  $source = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

  $result = '';
  for ($i = 0; $i < $len; $i++) {
    $result .= $source[array_rand($source)];
  }

  return $result;
}
