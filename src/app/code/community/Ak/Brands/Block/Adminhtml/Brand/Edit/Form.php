<?php

/**
 * Class Ak_Brands_Block_Adminhtml_Brand_Edit_Form
 */
class Ak_Brands_Block_Adminhtml_Brand_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ));


        $fieldset = $form->addFieldset('brand_form', array(
            'legend'=>Mage::helper('ak_brands')->__('Brand information')
        ));


        // Add the fields that we want to be editable.
        $this->addFieldsToFieldset($fieldset, array(
            'title' => array(
                'label' => $this->__('Name'),
                'input' => 'text',
                'required' => true,
            ),
            'description' => array(
                'label' => $this->__('Description'),
                'input' => 'textarea',
                'required' => true,
            ),
            'category' => array(
                'label' => $this->__('Category'),
                'input' => 'select',
                'required' => true,
                'options' => Mage::helper('ak_brands/category')->getCategoryOptions(),
            ),
//            'cms_page' => array(
//                'label' => $this->__('Visibility'),
//                'input' => 'select',
//                'required' => true,
//                'options' => $brandSingleton->getAvailableVisibilies(),
//            ),
//            'link_to' => array(
//                'label' => $this->__('Visibility'),
//                'input' => 'select',
//                'required' => true,
//                'options' => $brandSingleton->getAvailableVisibilies(),
//            ),

            /**
             * Note: we have not included created_at or updated_at.
             * We will handle those fields ourself in the model
             * before saving.
             */
        ));

        $form->setUseContainer(true);

        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * This method makes life a little easier for us by pre-populating
     * fields with $_POST data where applicable and wrapping our post data
     * in 'brandData' so that we can easily separate all relevant information
     * in the controller. You could of course omit this method entirely
     * and call the $fieldset->addField() method directly.
     */
    protected function addFieldsToFieldset(Varien_Data_Form_Element_Fieldset $fieldset, $fields)
    {
        $requestData = new Varien_Object($this->getRequest()->getPost('brandData'));

        foreach ($fields as $name => $_data) {
            if ($requestValue = $requestData->getData($name)) {
                $_data['value'] = $requestValue;
            }

            // Wrap all fields with brandData group.
            $_data['name'] = "brandData[$name]";

            // Generally, label and title are always the same.
            $_data['title'] = $_data['label'];

            // If no new value exists, use the existing brand data.
            if (!array_key_exists('value', $_data)) {
                $_data['value'] = $this->getBrand()->getData($name);
            }

            // Finally, call vanilla functionality to add field.
            $fieldset->addField($name, $_data['input'], $_data);
        }

        return $this;
    }


    /**
     * Retrieve the existing brand for pre-populating the form fields.
     * For a new brand entry, this will return an empty brand object.
     */
    protected function getBrand()
    {
        if (!$this->hasData('brand')) {
            // This will have been set in the controller.
            $brand = Mage::registry('current_brand');

            // Just in case the controller does not register the brand.
            if (!$brand instanceof
                Ak_Brands_Model_Brand) {
                $brand = Mage::getModel(
                    'ak_brands/brand'
                );
            }

            $this->setData('brand', $brand);
        }

        return $this->getData('brand');
    }
}
