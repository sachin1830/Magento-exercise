<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Api;

use Sachin\Session9Assignment\Model\SachinEntity;
use Sachin\Session9Assignment\Model\ResourceModel\SachinCollection\Collection;

interface SachinEntityRepositoryInterface
{
    public const SACHIN_ENTITY = 'sachin_entity';
    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return SachinEntity;
     */
    public function getById($entityId);

    /**
     * Get Collection
     *
     * @return Collection
     */
    public function getCollection();

    /**
     * Get Entity rows
     *
     * @param array $entityIds
     * @return array
     */
    public function getEnityRows($entityIds);
}
