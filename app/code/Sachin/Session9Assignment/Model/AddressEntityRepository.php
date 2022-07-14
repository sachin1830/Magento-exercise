<?php
namespace Sachin\Session9Assignment\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Sachin\Session9Assignment\Api\AddressEntityRepositoryInterface;
use Sachin\Session9Assignment\Api\Data\AddressEntityInterface;
use Sachin\Session9Assignment\Api\Data\AddressEntitySearchResultInterface;
use Sachin\Session9Assignment\Model\ResourceModel\SachinCollection\AddressCollectionFactory;
use Sachin\Session9Assignment\Model\ResourceModel\AddressEntity as ResourceModel;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Sachin\Session9Assignment\Api\Data\AddressEntitySearchResultInterfaceFactory as AddressEntitySearchResultFactory;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;

class AddressEntityRepository implements AddressEntityRepositoryInterface
{
    /**
     * @var AddressCollectionFactory
     */
    private AddressCollectionFactory $collectionFactory;
    /**
     * @var AddressEntityFactory
     */
    private AddressEntityFactory $addressEntityFactory;
    /**
     * @var ResourceModel
     */
    private ResourceModel $resourceModel;
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;
    /**
     * @var AddressEntitySearchResultFactory
     */
    private AddressEntitySearchResultFactory $addressEntitySearchResultFactory;
    /**
     * @var FilterBuilder
     */
    private FilterBuilder $filterBuilder;
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * AddressEntityRepository constructor.
     * @param AddressCollectionFactory $collectionFactory
     * @param AddressEntityFactory $addressEntityFactory
     * @param ResourceModel $resourceModel
     * @param CollectionProcessorInterface $collectionProcessor
     * @param AddressEntitySearchResultFactory $addressEntitySearchResultFactory
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        AddressCollectionFactory $collectionFactory,
        AddressEntityFactory $addressEntityFactory,
        ResourceModel $resourceModel,
        CollectionProcessorInterface $collectionProcessor,
        AddressEntitySearchResultFactory $addressEntitySearchResultFactory,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->addressEntityFactory = $addressEntityFactory;
        $this->resourceModel = $resourceModel;
        $this->collectionProcessor = $collectionProcessor;
        $this->addressEntitySearchResultFactory = $addressEntitySearchResultFactory;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return AddressEntityInterface[]|null
     */
    public function getAddressByEntityId($entityId)
    {
//        $collection = $this->collectionFactory->create();
//        $collection->addFieldToFilter('entity_id', ['eq' => $entityId]);
//        return $collection->getData();
        $filter = $this->filterBuilder->setField('entity_id')
            ->setConditionType('eq')
            ->setValue($entityId)
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder->addFilters([$filter])->create();
        return $this->getList($searchCriteria)->getItems();
    }

    /**
     * Get address by id
     *
     * @param string $addressId
     * @return AddressEntityInterface
     */
    public function getAddressById($addressId)
    {
        $address = $this->addressEntityFactory->create();
        $this->resourceModel->load($address, $addressId);
        return $address;
    }

    /**
     * Get list
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return AddressEntitySearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        /** @var AddressEntitySearchResultInterface $searchResults */
        $searchResults = $this->addressEntitySearchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
