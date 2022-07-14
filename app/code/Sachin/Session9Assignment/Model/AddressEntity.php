<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Sachin\Session9Assignment\Api\Data\AddressEntityExtensionInterface;
use Sachin\Session9Assignment\Api\Data\AddressEntityInterface;
use Sachin\Session9Assignment\Model\ResourceModel\AddressEntity as ResourceModel;

class AddressEntity extends AbstractExtensibleModel implements AddressEntityInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
    /**
     * Set Country
     *
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }
    /**
     * Get Country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }
    /**
     * Get City
     *
     * @return String
     */
    public function getCity()
    {
        return $this->getData(self::CITY);
    }
    /**
     * Set City
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }
    /**
     * Get Zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->getData(self::ZIP);
    }
    /**
     * Set Zip
     *
     * @param String $zip
     * @return $this
     */
    public function setZip($zip)
    {
        return $this->setData(self::ZIP, $zip);
    }
    /**
     * Get Street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->getData(self::STREET);
    }
    /**
     * Set Street
     *
     * @param string $street
     * @return $this
     */
    public function setStreet($street)
    {
        return $this->setData(self::STREET, $street);
    }
    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->getData(self::STATE);
    }
    /**
     * Set State
     *
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        return $this->setData(self::STATE, $state);
    }
    /**
     * Get Phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->getData(self::PHONE);
    }
    /**
     * Set Phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }
    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return AddressEntityExtensionInterface
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }
    /**
     * Set an extension attributes object.
     *
     * @param AddressEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(AddressEntityExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
