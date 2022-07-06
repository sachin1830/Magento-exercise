<?php

namespace Sachin\Session9Assignment\Model;

use Magento\Framework\Model\AbstractModel;
use Sachin\Session9Assignment\Model\ResourceModel\SachinEntity as ResourceModel;
use Sachin\Session9Assignment\Api\Data\SachinEntityInterface;

class SachinEntity extends AbstractModel implements SachinEntityInterface
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Get Created At
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
     * @return int
     */
    public function getAge()
    {
        return $this->getData(self::AGE);
    }

    /**
     * Get Height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->getData(self::HEIGHT);
    }

    /**
     * Get long description
     *
     * @return string
     */
    public function getLongDescription()
    {
        return $this->getData(self::LONG_DESCRIPTION);
    }

    /**
     * Get short description
     *
     * @return string
     */
    public function getShortDesciption()
    {
        return $this->getData(self::SHORT_DESCRIPTION);
    }

    /**
     * Is Employeed
     *
     * @return int
     */
    public function isEmployee()
    {
        return $this->getData(self::IS_EMPLOYEE);
    }
}
