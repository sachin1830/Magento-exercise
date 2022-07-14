<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface AddressEntitySearchResultInterface extends SearchResultsInterface
{
    /**
     * Get blocks list.
     *
     * @return AddressEntityInterface[]
     */
    public function getItems();

    /**
     * Set blocks list.
     *
     * @param AddressEntityInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
