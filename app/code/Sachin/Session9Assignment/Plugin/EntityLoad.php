<?php
namespace Sachin\Session9Assignment\Plugin;

use Sachin\Session9Assignment\Api\SachinEntityRepositoryInterface;
use Sachin\Session9Assignment\Api\Data\AddressEntityExtensionFactory;
use Sachin\Session9Assignment\Api\AddressEntityRepositoryInterface as Subject;
use Sachin\Session9Assignment\Api\Data\AddressEntityInterface;

class EntityLoad
{
    /**
     * @var AddressEntityExtensionFactory
     */
    private AddressEntityExtensionFactory $addressEntityExtensionFactory;
    /**
     * @var SachinEntityRepositoryInterface
     */
    private SachinEntityRepositoryInterface $sachinEntityRepository;

    /**
     * EntityLoad constructor.
     * @param SachinEntityRepositoryInterface $sachinEntityRepository
     * @param AddressEntityExtensionFactory $addressEntityExtensionFactory
     */
    public function __construct(
        SachinEntityRepositoryInterface $sachinEntityRepository,
        AddressEntityExtensionFactory $addressEntityExtensionFactory
    ) {
        $this->addressEntityExtensionFactory = $addressEntityExtensionFactory;
        $this->sachinEntityRepository = $sachinEntityRepository;
    }

    /**
     * Get by id
     *
     * @param Subject $subject
     * @param AddressEntityInterface $result
     */
    public function afterGetAddressById(Subject $subject, $result)
    {
        $extensionAttributes = $result->getExtensionAttributes();
        $entityExtension = $extensionAttributes ? $extensionAttributes : $this->addressEntityExtensionFactory->create();
        $entity = $this->sachinEntityRepository->getById($result->getEntityId());
        $entityExtension->setEntityCustomer($entity);
        return $result->setExtensionAttributes($entityExtension);
    }
}
