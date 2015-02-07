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

class Ak_Brands_Model_Resource_Setup extends Mage_Eav_Model_Entity_Setup
{

    /**
     * Prepare location attribute values to save in additional table
     *
     * @param array $attr
     * @return array
     */
    protected function _prepareValues($attr)
    {
        $data = parent::_prepareValues($attr);
        $data = array_merge($data, array(
            'is_enabled'                => $this->_getValue($attr, 'enabled', 1),
            'is_visible'                => $this->_getValue($attr, 'visible', 1),
            'is_system'                 => $this->_getValue($attr, 'system', 1),
            'input_filter'              => $this->_getValue($attr, 'input_filter', null),
            'multiline_count'           => $this->_getValue($attr, 'multiline_count', 0),
            'validate_rules'            => $this->_getValue($attr, 'validate_rules', null),
            'data_model'                => $this->_getValue($attr, 'data', null),
            'sort_order'                => $this->_getValue($attr, 'position', 0)
        ));

        return $data;
    }

    /**
     * Add customer attributes to location forms
     *
     * @return void
     */
    public function installBrandForms()
    {
        $brand           = (int)$this->getEntityTypeId(Ak_Brands_Model_Brand::ENTITY);

        $attributeIds       = array();
        $select = $this->getConnection()->select()
            ->from(
                array('ea' => $this->getTable('eav/attribute')),
                array('entity_type_id', 'attribute_code', 'attribute_id')
            )
            ->where('ea.entity_type_id IN(?)', array($brand));

        foreach ($this->getConnection()->fetchAll($select) as $row) {
            $attributeIds[$row['entity_type_id']][$row['attribute_code']] = $row['attribute_id'];
        }

        $data       = array();
        $entities   = $this->getDefaultEntities();

        $attributes = $entities['ak_brands_brand']['attributes'];
        foreach ($attributes as $attributeCode => $attribute) {
            $attributeId = $attributeIds[$brand][$attributeCode];
            $attribute['system'] = isset($attribute['system']) ? $attribute['system'] : true;
            $attribute['visible'] = isset($attribute['visible']) ? $attribute['visible'] : true;
            if (true !== $attribute['system'] || false !== $attribute['visible']) {
                $usedInForms = array(
                    'brand_create',
                    'brand_edit'
                );

                foreach ($usedInForms as $formCode) {
                    $data[] = array(
                        'form_code'     => $formCode,
                        'attribute_id'  => $attributeId
                    );
                }
            }
        }

        if ($data) {
            $this->getConnection()->insertMultiple($this->getTable('ak_brands/form_attribute'), $data);
        }
    }


    public function getDefaultEntities()
    {
        return array(
            Ak_Brands_Model_Brand::ENTITY => array(
                'entity_model' => 'ak_brands/brand',
                'table' => 'ak_brands/brand',
                'attribute_model'                => 'ak_brands/attribute',
                'increment_model'                => 'eav/entity_increment_numeric',
                'additional_attribute_table'     => 'ak_brands/eav_attribute',
                'entity_attribute_collection'    => 'ak_brands/attribute_collection',
                'attributes' => array(
                    'title' => array(
                        'type' => 'varchar',
                        'label' => 'Title',
                        'input' => 'text',
                        'required' => true,
                        'sort_order' => 10,
                        'position' => 10,
                        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                    ),
                    'description' => array(
                        'type' => 'varchar',
                        'label' => 'Description',
                        'input' => 'textarea',
                        'required' => false,
                        'sort_order' => 10,
                        'position' => 20,
                        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                    ),
                    'category' => array(
                        'type' => 'int',
                        'label' => 'Category',
                        'input' => 'text',
                        'required' => false,
                        'sort_order' => 10,
                        'position' => 30,
                        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                    ),
                    'cms_page' => array(
                        'type' => 'int',
                        'label' => 'CMS Page',
                        'input' => 'text',
                        'required' => false,
                        'sort_order' => 10,
                        'position' => 40,
                        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                    ),
                    'link_to' => array(
                        'type' => 'int',
                        'label' => 'Link To',
                        'input' => 'text',
                        'required' => true,
                        'sort_order' => 10,
                        'position' => 50,
                        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
                    )
                )
            )
        );
    }
}
