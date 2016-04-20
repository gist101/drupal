<?php

// The folder need to prepare first.
$uri = "public://field_test_package/dsafids/dfajsdofi/abc.zip";
file_prepare_directory($uri, FILE_CREATE_DIRECTORY|FILE_MODIFY_PERMISSIONS);
// If parents not exits, there would be no realpath.
dsm(drupal_realpath("public://field_test_package/dsafids/dfajsdofi/abc.zip"));
