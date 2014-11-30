<?php
/**
 * Brand extension for Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @copyright 2014 Andrew Kett. (http://www.andrewkett.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://andrewkett.github.io/Ak_Locator/
 */

/**
 * Class Ak_Brands_Model_Brand
 */
class Ak_Brands_Model_Brand extends Mage_Core_Model_Abstract
{
    /**
     * Entity code.
     * Can be used as part of method name for entity processing
     */

    const ENTITY                = 'ak_brands_brand';
    const CACHE_TAG             = 'ak_brands_brand';

    protected $_cacheTag        = 'ak_brands_brand';

    protected $_eventPrefix     = 'ak_brands';
    protected $_eventObject     = 'ak_brands_brand';

    protected $_canAffectOptions = false;

    public function _construct()
    {
        $this->_init('ak_brands/brand');
    }

}
