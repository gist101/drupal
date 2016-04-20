<?php

// @doc http://pingv.com/blog/text-formats-101-how-drupal-filters-work

hook_filter_info();
hook_filter_info_alter(&$info);

filter_get_filters();

// Parse Text
check_markup($text, $format_id = NULL, $langcode = '', $cache = FALSE);

filter_access($format, $account = NULL);


