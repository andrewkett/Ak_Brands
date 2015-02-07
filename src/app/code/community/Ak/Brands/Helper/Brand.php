<?php

/**
 * Class Ak_Brands_Helper_Category
 */
class Ak_Brands_Helper_Brand extends Mage_Core_Helper_Abstract
{
    public function getBrandUrl($brand)
    {

        $catId = $brand->getData('category');
        $category = Mage::getModel('catalog/category')->load($catId);
        $url = $category->getUrl();

        return $url;
    }
}
