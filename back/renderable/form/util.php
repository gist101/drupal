<?php

drupal_get_form($form_id);

drupal_form_submit();

drupal_build_form($form_id, &$form_state);

drupal_redirect_form($form_state);
