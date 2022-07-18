<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SachinEntitySearchResultInterface extends SearchResultsInterface
{
    /**
     * Get blocks list.
     *
     * @return SachinEntityInterface[]
     */
    public function getItems();

    /**
     * Set blocks list.
     *
     * @param SachinEntityInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
