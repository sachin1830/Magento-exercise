<?php

namespace Sachin\Session9Assignment\Model;

use Sachin\Session9Assignment\Api\Data\SachinEntityExtensionInterface;
use Sachin\Session9Assignment\Model\ResourceModel\SachinEntity as ResourceModel;
use Sachin\Session9Assignment\Api\Data\SachinEntityInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class SachinEntity extends AbstractExtensibleModel implements SachinEntityInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }
    /**
     * Get Name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }
    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
    /**
     * Get CreatedAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
    /**
     * Get Age
     *
     * @return int|null
     */
    public function getAge()
    {
        return $this->getData(self::AGE);
    }
    /**
     * Set Age
     *
     * @param int $age
     * @return $this
     */
    public function setAge($age)
    {
        return $this->setData(self::AGE, $age);
    }
    /**
     * Get Height
     *
     * @return float|null
     */
    public function getHeight()
    {
        return $this->getData(self::HEIGHT);
    }
    /**
     * Set Height
     *
     * @param float $height
     * @return $this
     */
    public function setHeight($height)
    {
        return $this->setData(self::HEIGHT, $height);
    }
    /**
     * Get Long Description
     *
     * @return string|null
     */
    public function getLongDescription()
    {
        return $this->getData(self::LONG_DESCRIPTION);
    }
    /**
     * Set Long Description
     *
     * @param string $longDesc
     * @return $this
     */
    public function setLongDescription($longDesc)
    {
        return $this->setData(self::LONG_DESCRIPTION, $longDesc);
    }
    /**
     * Get Short Description
     *
     * @return string|null
     */
    public function getShortDesciption()
    {
        return $this->getData(self::SHORT_DESCRIPTION);
    }
    /**
     * Set Short Description
     *
     * @param string $shortDesc
     * @return $this
     */
    public function setShortDesciption($shortDesc)
    {
        return $this->setData(self::SHORT_DESCRIPTION, $shortDesc);
    }
    /**
     * Is Employeed
     *
     * @return boolean|null
     */
    public function getIsEmployee()
    {
        return $this->getData(self::SHORT_DESCRIPTION);
    }
    /**
     * Set Is Employeed
     *
     * @param bool $employee
     * @return $this
     */
    public function setIsEmployee($employee)
    {
        return $this->setData(self::IS_EMPLOYEE, $employee);
    }
    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Sachin\Session9Assignment\Api\Data\SachinEntityExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }
    /**
     * Set an extension attributes object.
     *
     * @param \Sachin\Session9Assignment\Api\Data\SachinEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SachinEntityExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
