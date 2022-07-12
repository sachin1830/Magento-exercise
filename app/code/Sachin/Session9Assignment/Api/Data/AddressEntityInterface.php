<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface AddressEntityInterface extends ExtensibleDataInterface
{
    public const ID = 'address_id';
    public const ENTITY_ID = 'entity_id';
    public const COUNTRY = 'country';
    public const CITY = 'city';
    public const STATE = 'state';
    public const STREET = 'street';
    public const ZIP = 'zip';
    public const PHONE = 'phone';

    /**
     * Get Id
     *
     * @return int
     */
    public function getId();

    /**
     * Set Entity ID
     *
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * Get Entity ID
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set Country
     *
     * @param string $country
     * @return $this
     */
    public function setCountry($country);

    /**
     * Get Country
     *
     * @return string
     */
    public function getCountry();

    /**
     * Get City
     *
     * @return String
     */
    public function getCity();

    /**
     * Set City
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city);

    /**
     * Get Zip
     *
     * @return string
     */
    public function getZip();

    /**
     * Set Zip
     *
     * @param String $zip
     * @return $this
     */
    public function setZip($zip);

    /**
     * Get Street
     *
     * @return string
     */
    public function getStreet();

    /**
     * Set Street
     *
     * @param string $street
     * @return $this
     */
    public function setStreet($street);

    /**
     * Get state
     *
     * @return string
     */
    public function getState();

    /**
     * Set State
     *
     * @param string $state
     * @return $this
     */
    public function setState($state);

    /**
     * Get Phone
     *
     * @return string
     */
    public function getPhone();

    /**
     * Set Phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Sachin\Session9Assignment\Api\Data\AddressEntityExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Sachin\Session9Assignment\Api\Data\AddressEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Sachin\Session9Assignment\Api\Data\AddressEntityExtensionInterface
                                           $extensionAttributes);
}
