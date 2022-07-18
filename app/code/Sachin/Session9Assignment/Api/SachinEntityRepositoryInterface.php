<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Sachin\Session9Assignment\Api\Data\SachinEntityInterface;
use Sachin\Session9Assignment\Model\ResourceModel\SachinCollection\Collection;

interface SachinEntityRepositoryInterface
{
    public const SACHIN_ENTITY = 'sachin_entity';
    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return SachinEntityInterface
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

    /**
     * Delete entity by id
     *
     * @param string $entityId
     * @return mixed
     */
    public function deleteById($entityId);

    /**
     * Save
     *
     * @param SachinEntityInterface $entity
     * @return boolean
     */
    public function save(SachinEntityInterface $entity);

    /**
     * Get List
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Sachin\Session9Assignment\Api\Data\SachinEntitySearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}
