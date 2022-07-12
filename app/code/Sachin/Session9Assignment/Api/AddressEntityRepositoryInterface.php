<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Api;

use Sachin\Session9Assignment\Api\Data\AddressEntityInterface;

interface AddressEntityRepositoryInterface
{
    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return AddressEntityInterface[]
     */
    public function getAddressByEntityId($entityId);
    /**
     * Get address by id
     *
     * @param string $addressId
     * @return AddressEntityInterface
     */
    public function getAddressById($addressId);
}
