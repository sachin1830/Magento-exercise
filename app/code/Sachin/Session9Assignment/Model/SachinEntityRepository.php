<?php
namespace Sachin\Session9Assignment\Model;

use Sachin\Session9Assignment\Api\SachinEntityRepositoryInterface;
use Sachin\Session9Assignment\Model\ResourceModel\SachinEntity as ResourceModel;
use Sachin\Session9Assignment\Model\SachinEntityFactory as EntityFactory;
use Sachin\Session9Assignment\Model\ResourceModel\SachinCollection\Collection;
use Sachin\Session9Assignment\Model\SachinEntity;

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
    private \Sachin\Session9Assignment\Model\SachinEntity $sachinEntity;

    /**
     * SachinEntityRepository constructor.
     *
     * @param ResourceModel $resourceModel
     * @param SachinEntityFactory $entityFactory
     * @param Collection $collection
     * @param \Sachin\Session9Assignment\Model\SachinEntity $sachinEntity
     */
    public function __construct(
        ResourceModel $resourceModel,
        EntityFactory $entityFactory,
        Collection $collection,
        SachinEntity $sachinEntity
    ) {
        $this->resouceModel = $resourceModel;
        $this->entityFactory = $entityFactory;
        $this->collection = $collection;
        $this->sachinEntity = $sachinEntity;
    }

    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return SachinEntity
     */
    public function getById($entityId)
    {
        //$entity = $this->entityFactory->create();

        $this->resouceModel->load($this->sachinEntity, $entityId);
        return $this->sachinEntity;
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
