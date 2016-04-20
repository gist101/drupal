<?php

// =============================================================================
// Request

$_GET['q'];

// Follow ?q= query.
$request_path;

// Follow browser path.
$request_uri;

current_path();

drupal_realpath($uri);


drupal_get_destination();

// =============================================================================
// Status, Predefined Responses

drupal_access_denied();

drupal_not_found();

drupal_site_offline();

drupal_fast_404();


// =============================================================================
// Redirect

drupal_goto();

hook_drupal_goto_alter();


drupal_redirect_form();
$form_state['redirect'] = 'node';



