<?php

class Ak_Brands_Model_Product_Attribute_Source_Brand extends Mage_Eav_Model_Entity_Attribute_Source_Abstract {

    /**
     * Get list of all available countries
     *
     * @return mixed
     */
    public function getAllOptions()
    {
//        $cacheKey = 'DIRECTORY_COUNTRY_SELECT_STORE_' . Mage::app()->getStore()->getCode();
//        if (Mage::app()->useCache('config') && $cache = Mage::app()->loadCache($cacheKey)) {
//            $options = unserialize($cache);
//        } else {
            $collection = Mage::getModel('ak_brands/brand')->getResourceCollection();
            $options = $collection->toOptionArray();
//            if (Mage::app()->useCache('config')) {
//                Mage::app()->saveCache(serialize($options), $cacheKey, array('config'));
//            }
        //}
        return $options;
    }
}