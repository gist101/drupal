<?php

// -----------------------------------------------------------------------------
// Class
// @see EntityMetadataWrapper
// @see EntityDrupalWrapper
// @see EntityListWrapper
// @see EntityStructureWrapper
// @see EntityValueWrapper

entity_metadata_wrapper($type, $data = NULL, $info = array());

// Example
$entity_wrapper = entity_metadata_wrapper('test_entityreference', 1);
dsm($entity_wrapper);


// Property info
dsm($entity_wrapper->info());
dsm($entity_wrapper->getPropertyInfo());

// Entity type, if it's entity wrapper, it would be
$entity_wrapper->type();

// Q: Check if save() entity wrapper would change the entity data.
// A: Yes, the entity will be changed, the new one has the created id, it's a real entity.
$product = commerce_product_new('album');
dsm($product);
$product_wrapper = entity_metadata_wrapper('commerce_product', $product);
$product_wrapper->save();
dsm($product);

// Field File/Image
$entity_wrapper->field_image->type() == 'field_item_image';
$file = $entity_wrapper->field_image->file;
