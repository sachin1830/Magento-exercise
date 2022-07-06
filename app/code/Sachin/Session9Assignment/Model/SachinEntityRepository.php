<?php
namespace Sachin\Session9Assignment\Model;

use Sachin\Session9Assignment\Api\SachinEntityRepositoryInterface;
use Sachin\Session9Assignment\Model\ResourceModel\SachinEntity as ResourceModel;
use Sachin\Session9Assignment\Model\SachinEntityFactory as EntityFactory;
use Sachin\Session9Assignment\Model\ResourceModel\SachinCollection\Collection;;

class SachinEntityRepository implements SachinEntityRepositoryInterface
{
    /**
     * @var ResourceModel
     */
    private ResourceModel $resouceModel;
    /**
     * @var SachinEntityFactory
     */
    private SachinEntityFactory $entityFactory;
    /**
     * @var Collection
     */
    private Collection $collection;

    /**
     * SachinEntityRepository constructor.
     *
     * @param ResourceModel $resourceModel
     * @param SachinEntityFactory $entityFactory
     * @param Collection $collection
     */
    public function __construct(
        ResourceModel $resourceModel,
        EntityFactory $entityFactory,
        Collection $collection
    ) {
        $this->resouceModel = $resourceModel;
        $this->entityFactory = $entityFactory;
        $this->collection = $collection;
    }

    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return SachinEntity
     */
    public function getById($entityId)
    {
        $entity = $this->entityFactory->create();
        $this->resouceModel->load($entity, $entityId);
        return $entity;
    }

    /**
     * Get Collection
     *
     * @return Collection
     */
    public function getCollection()
    {
        return $entityCollection =  $this->collection->load();
    }
}
