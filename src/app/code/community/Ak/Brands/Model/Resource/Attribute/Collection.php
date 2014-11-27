<?php

class Ak_Brands_Model_Resource_Attribute_Collection extends Mage_Eav_Model_Resource_Attribute_Collection
{


    /**
     * Default attribute entity type code
     *
     * @var string
     */
    protected $_entityTypeCode   = 'ak_brands_brand';

    /**
     * Default attribute entity type code
     *
     * @return string
     */
    protected function _getEntityTypeCode()
    {
        return $this->_entityTypeCode;
    }

    /**
     * Get EAV website table
     *
     * Get table, where website-dependent attribute parameters are stored
     * If realization doesn't demand this functionality, let this function just return null
     *
     * @return string|null
     */
    protected function _getEavWebsiteTable()
    {
        return $this->getTable('ak_brands/eav_attribute_website');
    }
}