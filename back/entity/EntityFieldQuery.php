<?php

// -----------------------------------------------------------------------------
// @link https://drupal.org/node/1343708 
// @link http://www.phase2technology.com/blog/entityfieldquery-let-drupal-do-the-heavy-lifting-pt-1/
// @link http://drupal7.api:8082/api/drupal/includes%21entity.inc/class/EntityFieldQuery/7.x

// Test
$query = new EntityFieldQuery();
$query->fieldCondition('field_dir_category_parent', 'target_id', 4, '=');
//$query->fieldCondition('field_dir_category_parent', 'language', 'und');
$result = $query->execute();
dsm($result);

// It works, but it just return the stdClass, not Entity class object. 
$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'dir_role')
  ->propertyCondition('link_id', 1);
$result = $query->execute();
dsm($result);

// The result array of different entity would be differnt. Node will return nid, vid, type.
$query = new EntityFieldQuery();
$query->entityCondition('entity_type', 'node')
  ->propertyCondition('nid', 1);
$result = $query->execute();
dsm($result);

/**
 * Get the pd by product.
 */
function miiniu_biz_product_get_pd($product) {
  $id = $product->product_id;
  $query = new EntityFieldQuery();
  $query->entityCondition('entity_type', 'product_display')
  ->entityCondition('bundle', 'publication')
  //->entityOrderBy('entityform', 'entityform_id', 'DESC')
  ->fieldCondition('field_pd_product_ref', 'product_id', $id, '=')
  ->range(0, 1);
  //->addMetaData('account', user_load(1));
  $result = $query->execute();
  // The result 
  if (isset($result['product_display'])) {
    $pd_raw = reset($result['product_display']);
    return entity_load_single('product_display', $pd_raw->id);
  }
  return NULL;
}
