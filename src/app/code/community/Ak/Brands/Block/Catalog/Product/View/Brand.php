<?php

/**
 * Class Ak_Brands_Block_Catalog_Product_View_Brand
 */
class Ak_Brands_Block_Catalog_Product_View_Brand extends Mage_Core_Block_Template
{

    /**
     * @return Ak_Brands_Model_Brand
     */
    public function getBrand()
    {
        if ($this->getData('brand') === null) {

            $product = Mage::registry('current_product');
            $brandId = (int)$product->getBrand();

            $brand = Mage::getModel('ak_brands/brand')->load($brandId);
            $this->setData('brand', $brand);
        }

        return $this->getData('brand');
    }

    /**
     * @return bool
     */
    public function showBrand()
    {
        if ($this->getBrand()->getId() >= 1) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getBrandUrl()
    {
        return $this->helper('ak_brands/brand')->getBrandUrl($this->getBrand());
    }

    /**
     * @return string
     */
    public function getBrandTitle()
    {
        return $this->getBrand()->getTitle();
    }
}
