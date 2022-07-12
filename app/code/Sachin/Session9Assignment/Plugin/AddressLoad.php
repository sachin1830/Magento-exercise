<?php
namespace Sachin\Session9Assignment\Plugin;

use Sachin\Session9Assignment\Api\Data\SachinEntityExtension;
use Sachin\Session9Assignment\Api\Data\SachinEntityExtensionFactory;
use Sachin\Session9Assignment\Api\SachinEntityRepositoryInterface as Subject;
use Sachin\Session9Assignment\Api\Data\SachinEntityInterface;
use Sachin\Session9Assignment\Api\AddressEntityRepositoryInterface;

class AddressLoad
{
    /**
     * @var SachinEntityExtension
     */
    private SachinEntityExtension $sachinEntityExtension;
    /**
     * @var SachinEntityExtensionFactory
     */
    private SachinEntityExtensionFactory $sachinEntityExtensionFactory;
    /**
     * @var AddressEntityRepositoryInterface
     */
    private AddressEntityRepositoryInterface $addressEntityRepository;

    /**
     * AddressLoad constructor.
     * @param SachinEntityExtension $sachinEntityExtension
     * @param SachinEntityExtensionFactory $sachinEntityExtensionFactory
     * @param AddressEntityRepositoryInterface $addressEntityRepository
     */
    public function __construct(
        SachinEntityExtension $sachinEntityExtension,
        SachinEntityExtensionFactory $sachinEntityExtensionFactory,
        AddressEntityRepositoryInterface $addressEntityRepository
    ) {
        $this->sachinEntityExtension = $sachinEntityExtension;
        $this->sachinEntityExtensionFactory = $sachinEntityExtensionFactory;
        $this->addressEntityRepository = $addressEntityRepository;
    }

    /**
     * Get by id
     *
     * @param Subject $subject
     * @param SachinEntityInterface $result
     */
    public function afterGetById(Subject $subject, $result)
    {
        $extensionAttributes = $result->getExtensionAttributes();
        $entityExtension = $extensionAttributes ? $extensionAttributes : $this->sachinEntityExtensionFactory->create();
        $address = $this->addressEntityRepository->getAddressByEntityId($result->getId());
        $entityExtension->setEntityAddress($address);
        return $result->setExtensionAttributes($entityExtension);
    }
}
