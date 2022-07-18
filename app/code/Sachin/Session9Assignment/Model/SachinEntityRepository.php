<?php
namespace Sachin\Session9Assignment\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Sachin\Session9Assignment\Api\Data\SachinEntitySearchResultInterface;
use Sachin\Session9Assignment\Api\SachinEntityRepositoryInterface;
use Sachin\Session9Assignment\Model\ResourceModel\SachinEntity as ResourceModel;
use Sachin\Session9Assignment\Model\SachinEntityFactory as EntityFactory;
use Sachin\Session9Assignment\Model\ResourceModel\SachinCollection\CollectionFactory;
use Sachin\Session9Assignment\Model\ResourceModel\SachinCollection\Collection;
use Magento\Framework\App\ResourceConnection;
use Sachin\Session9Assignment\Api\Data\SachinEntityInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Sachin\Session9Assignment\Api\Data\SachinEntitySearchResultInterfaceFactory;

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
     * @var CollectionFactory
     */
    private CollectionFactory $collectionfactory;

    /**
     * @var ResourceConnection
     */
    private ResourceConnection $resourceConnection;
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;
    /**
     * @var SachinEntitySearchResultInterfaceFactory
     */
    private SachinEntitySearchResultInterfaceFactory $entitySearchResulFactory;
    /**
     * @var Collection
     */
    private Collection $collection;

    /**
     * SachinEntityRepository constructor.
     *
     * @param ResourceModel $resourceModel
     * @param SachinEntityFactory $entityFactory
     * @param CollectionFactory $collectionfactory
     * @param ResourceConnection $resourceConnection
     * @param CollectionProcessorInterface $collectionProcessor
     * @param Collection $collection
     * @param SachinEntitySearchResultInterfaceFactory $entitySearchResulFactory
     */
    public function __construct(
        ResourceModel $resourceModel,
        EntityFactory $entityFactory,
        CollectionFactory $collectionfactory,
        ResourceConnection $resourceConnection,
        CollectionProcessorInterface $collectionProcessor,
        Collection $collection,
        SachinEntitySearchResultInterfaceFactory $entitySearchResulFactory
    ) {
        $this->resouceModel = $resourceModel;
        $this->entityFactory = $entityFactory;
        $this->collectionfactory = $collectionfactory;
        $this->resourceConnection = $resourceConnection;
        $this->collectionProcessor = $collectionProcessor;
        $this->entitySearchResulFactory = $entitySearchResulFactory;
        $this->collection = $collection;
    }

    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return SachinEntityInterface|null
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
        return $this->collection->load();
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

    /**
     * Get List
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Sachin\Session9Assignment\Api\Data\SachinEntitySearchResultInterface|void
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionfactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        /** @var SachinEntitySearchResultInterface $searchResults */
        $searchResults = $this->entitySearchResulFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * Save
     *
     * @param SachinEntityInterface $entity
     * @return bool
     */
    public function save(SachinEntityInterface $entity)
    {
        try {
            $this->resouceModel->save($entity);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
