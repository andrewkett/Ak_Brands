<?php

class Ak_Brands_Block_Adminhtml_Brand_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{


    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'ak_brands';
        $this->_controller = 'adminhtml_brand';
        $this->_mode = 'edit';

        $this->_addButton('save_and_continue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);
        $this->_updateButton('save', 'label', Mage::helper('ak_brands')->__('Save Brand'));

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('form_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edit_form');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }


    public function getHeaderText()
    {
        if (Mage::registry('brand_data') && Mage::registry('brand_data')->getId()) {
            return Mage::helper('ak_brands')->__('%s', $this->htmlEscape(Mage::registry('brand_data')->getTitle()));
        } else {
            return Mage::helper('ak_brands')->__('New Brand');
        }
    }
}
