<?php


class Ak_Brands_Model_Attribute extends Mage_Eav_Model_Attribute
{
    /**
     * Name of the module
     */
    const MODULE_NAME = 'Ak_Brands';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'ak_brands_entity_attribute';

    /**
     * Prefix of model events object
     *
     * @var string
     */
    protected $_eventObject = 'attribute';

    /**
     * Init resource model
     */
    protected function _construct()
    {
        $this->_init('ak_brands/attribute');
    }
}
