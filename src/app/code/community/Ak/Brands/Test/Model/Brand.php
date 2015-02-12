<?php

class Ak_Brands_Test_Model_Brand extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @var Ak_Brands_Model_Brand
     */
    protected $_model;

    /**
     * Set up test class
     */
    protected function setUp()
    {
        parent::setUp();
        $this->_model = Mage::getModel('ak_brands/brand');
    }

    /**
     * @test
     */
    public function testInstance()
    {
        $this->assertInstanceOf('Ak_Brands_Model_Brand', $this->_model);
    }
}
