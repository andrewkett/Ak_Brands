<?php

class Ak_Brands_Model_Product_Attribute_Source_Brand extends Mage_Eav_Model_Entity_Attribute_Source_Abstract {

    /**
     * Get list of all available countries
     *
     * @return mixed
     */
    public function getAllOptions()
    {
        $collection = Mage::getModel('ak_brands/brand')->getResourceCollection();
        $options = $collection->toOptionArray();

        return $options;
    }
}
