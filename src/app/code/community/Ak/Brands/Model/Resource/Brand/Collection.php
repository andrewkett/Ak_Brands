<?php
/**
 * Location extension for Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @copyright 2013 Andrew Kett. (http://www.andrewkett.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://andrewkett.github.io/Ak_Locator/
 */

class Ak_Brands_Model_Resource_Brand_Collection extends Mage_Eav_Model_Entity_Collection_Abstract
{

    protected function _construct()
    {
        $this->_init('ak_brands/brand');
    }

    /**
     * Override parent method to remove entity_type_id filter
     *
     * @return $this
     */
    protected function _initSelect()
    {

        $this->getSelect()
            ->from(array('e' => $this->getEntity()->getEntityTable()));

        $this->addAttributeToSelect('title');

        return $this;
    }


    /**
     * @param string $valueField
     * @param string $labelField
     * @param array $additional
     *
     * @return mixed
     */
    public function toOptionArray($valueField = 'entity_id', $labelField = 'title', $additional = array())
    {
        return $this->_toOptionArray($valueField, $labelField, $additional);
    }

}
