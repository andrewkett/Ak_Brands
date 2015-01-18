# Ak Brands Magento Brand Extension

## Setup Theme

The following code should be added somewhere in catalog/product/view.phtml

```php
<?php echo $this->getChildHtml('brand') ?>
```