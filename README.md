# Magento Brand Extension

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andrewkett/Ak_Brands/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andrewkett/Ak_Brands/?branch=master)

## Setup Theme

The following code should be added somewhere in catalog/product/view.phtml

```php
<?php echo $this->getChildHtml('brand') ?>
```
