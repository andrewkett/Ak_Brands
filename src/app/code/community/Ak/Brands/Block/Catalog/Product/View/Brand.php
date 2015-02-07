<?php

/**
 * Class Ak_Brands_Block_Catalog_Product_View_Brand
 */
class Ak_Brands_Block_Catalog_Product_View_Brand extends Mage_Core_Block_Template
{

    public function getBrand()
    {
        $product = Mage::registry('current_product');

        if (!$product instanceof Mage_Catalog_Model_Product) {
            return false;
        }

        $brandId = (int)$product->getBrand();
        $brand = Mage::getModel('ak_brands/brand')->load($brandId);

        if ($brand->getId() < 1) {
            return false;
        }

        return $brand;
    }
}
