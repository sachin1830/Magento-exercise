<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\CustomPlugin\Plugin;

use Magento\Catalog\Model\Product;

/**
 * Add 'My' before product name
 */
class AfterName
{
 /**
  * Before name 'my' will append
  *
  * @param Product $subject
  * @param string $result
  * @return string
  */
    public function afterGetName(Product $subject, $result)
    {
        return 'My '. $result;
    }
}
