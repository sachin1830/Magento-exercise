<?php
namespace Sachin\Session9Assignment\Model;

use Sachin\Session9Assignment\Api\AddressEntityRepositoryInterface;
use Sachin\Session9Assignment\Api\Data\AddressEntityInterface;
use Sachin\Session9Assignment\Model\ResourceModel\SachinCollection\AddressCollectionFactory;
use Sachin\Session9Assignment\Model\AddressEntityFactory;
use Sachin\Session9Assignment\Model\ResourceModel\AddressEntity as ResourceModel;

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
     * AddressEntityRepository constructor.
     * @param AddressCollectionFactory $collectionFactory
     * @param AddressEntityFactory $addressEntityFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        AddressCollectionFactory $collectionFactory,
        AddressEntityFactory $addressEntityFactory,
        ResourceModel $resourceModel
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->addressEntityFactory = $addressEntityFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * Get entity by id
     *
     * @param string $entityId
     * @return AddressEntityInterface[]|null
     */
    public function getAddressByEntityId($entityId)
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('entity_id', ['eq' => $entityId]);
        return $collection->getData();
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
}
