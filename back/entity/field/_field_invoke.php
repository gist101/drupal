<?php

// http://www.kalaxy7.api/api/kalaxy/kalaxy-7.x/search/field_default_

field_default_form($entity_type, $entity, $field, $instance, $langcode, $items, &$form, &$form_state, $get_delta = NULL);
field_default_validate($entity_type, $entity, $field, $instance, $langcode, $items, &$errors);
field_default_submit($entity_type, $entity, $field, $instance, $langcode, &$items, $form, &$form_state);

field_default_view($entity_type, $entity, $field, $instance, $langcode, $items, $display);
