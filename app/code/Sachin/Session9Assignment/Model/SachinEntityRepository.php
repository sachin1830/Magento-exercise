<?php
namespace Sachin\Session9Assignment\Model;

use Sachin\Session9Assignment\Api\SachinEntityRepositoryInterface;
use Sachin\Session9Assignment\Model\ResourceModel\SachinEntity as ResourceModel;
use Sachin\Session9Assignment\Model\SachinEntityFactory as EntityFactory;
use Sachin\Session9Assignment\Model\ResourceModel\SachinCollection\Collection;
use Magento\Framework\App\ResourceConnection;
use Sachin\Session9Assignment\Api\Data\SachinEntityInterface;

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
     * @var ResourceConnection
     */
    private ResourceConnection $resourceConnection;

    /**
     * SachinEntityRepository constructor.
     *
     * @param ResourceModel $resourceModel
     * @param SachinEntityFactory $entityFactory
     * @param Collection $collection
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(
        ResourceModel $resourceModel,
        EntityFactory $entityFactory,
        Collection $collection,
        ResourceConnection $resourceConnection
    ) {
        $this->resouceModel = $resourceModel;
        $this->entityFactory = $entityFactory;
        $this->collection = $collection;
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return SachinEntityInterface|array
     */
    public function getById($entityId)
    {
        $entity = $this->entityFactory->create();
        $this->resouceModel->load($entity, $entityId);
        return $entity;

//        $connection = $this->resourceConnection->getConnection();
//        $query = $connection->select()->from(['entity' => self::SACHIN_ENTITY])
//            ->join(
//                ['address' => 'sachin_address'],
//                'entity.entity_id = address.entity_id'
//            )
//            ->where('entity.entity_id = ?', $entityId);
//        return $connection->fetchAssoc($query);
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

    /**
     * Get Entity Rows
     *
     * @param array $entityIds
     * @return array
     */
    public function getEnityRows($entityIds)
    {
        $connection = $this->resourceConnection->getConnection();
        $tableName = $connection->getTableName(self::SACHIN_ENTITY);
        $query = $connection->select()
            ->from($tableName)
            ->where('entity_id IN (?)', $entityIds);
        return $connection->fetchAssoc($query);
    }

    /**
     * Delete entity by id
     *
     * @param string $entityId
     * @return mixed|ResourceModel
     * @throws \Exception
     */
    public function deleteById($entityId)
    {
        $entity = $this->entityFactory->create();
        $this->resouceModel->load($entity, $entityId);
        return $this->resouceModel->delete($entity);
    }
}
