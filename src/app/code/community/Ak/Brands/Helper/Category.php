<?php

/**
 * Class Ak_Brands_Helper_Category
 */
class Ak_Brands_Helper_Category
{
    public function getCategoryOptions()
    {
        $categoriesArray = Mage::getModel('catalog/category')
            ->getCollection()
            ->addAttributeToSelect('name')
            ->addAttributeToSort('path', 'asc')
            ->addFieldToFilter('is_active', array('eq'=>'1'))
            ->load()
            ->toArray();

        foreach ($categoriesArray as $categoryId => $category) {
            if (isset($category['name'])) {
                $categories[$categoryId] = $category['name'];
            }
        }

        return $categories;
    }
}