<?php

class Ak_Brands_Block_Adminhtml_Brand_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('brand_info_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('ak_brands')->__('Brand Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label'     => Mage::helper('ak_brands')->__('Brand Information'),
            'title'     => Mage::helper('ak_brands')->__('Brand Information'),
        ));

        return parent::_beforeToHtml();
    }
}
