# Magento Brand Extension

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andrewkett/Ak_Brands/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andrewkett/Ak_Brands/?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/c0bdb610-baad-414d-8b09-f3a4136912c8/mini.png)](https://insight.sensiolabs.com/projects/c0bdb610-baad-414d-8b09-f3a4136912c8)

## Setup Theme

The following code should be added somewhere in catalog/product/view.phtml

```php
<?php echo $this->getChildHtml('brand') ?>
```
