<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface SachinEntityInterface extends ExtensibleDataInterface
{
    public const ID = 'entity_id';
    public const NAME = 'entity_name';
    public const AGE = 'age';
    public const HEIGHT = 'height';
    public const CREATED_AT = 'created_at';
    public const SHORT_DESCRIPTION = 'short_description';
    public const LONG_DESCRIPTION = 'long_description';
    public const IS_EMPLOYEE = 'is_employee';

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();
    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);
    /**
     * Get CreatedAt
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Get Age
     *
     * @return int
     */
    public function getAge();

    /**
     * Set Age
     *
     * @param int $age
     * @return $this
     */
    public function setAge($age);
    /**
     * Get Height
     *
     * @return float
     */
    public function getHeight();

    /**
     * Set Height
     *
     * @param float $height
     * @return $this
     */
    public function setHeight($height);

    /**
     * Get Long Description
     *
     * @return string
     */
    public function getLongDescription();

    /**
     * Set Long Description
     *
     * @param string $longDesc
     * @return $this
     */
    public function setLongDescription($longDesc);

    /**
     * Get Short Description
     *
     * @return string
     */
    public function getShortDesciption();

    /**
     * Set Short Description
     *
     * @param string $shortDesc
     * @return $this
     */
    public function setShortDesciption($shortDesc);
    /**
     * Is Employeed
     *
     * @return boolean
     */
    public function getIsEmployee();

    /**
     * Set Is Employeed
     *
     * @param bool $employee
     * @return $this
     */
    public function setIsEmployee($employee);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Sachin\Session9Assignment\Api\Data\SachinEntityExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Sachin\Session9Assignment\Api\Data\SachinEntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Sachin\Session9Assignment\Api\Data\SachinEntityExtensionInterface
                                           $extensionAttributes);
}
