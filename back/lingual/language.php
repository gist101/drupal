<?php

// -----------------------------------------------------------------------------
// Globals

// An object containing the information for the active interface language.
$language;
// An object containing the information for the active content language.
$language_content;
// An object containing the information for the active URL language.
$language_url;

// -----------------------------------------------------------------------------
// Debug globals value

global $language, $language_content, $language_url;
dsm($language, 'language');
dsm($language_content, 'language_content');
dsm($language_url, 'language_url');

