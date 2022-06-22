<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\CustomPlugin\Plugin;

use Magento\Catalog\Model\Product;

/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

class AfterPrice
{
    /**
     * Product price updated by 20.6
     *
     * @param Product $subject
     * @param int $result
     * @return int
     */
    public function afterGetPrice(Product $subject, $result)
    {
        return $result + 20.6;
    }
}
