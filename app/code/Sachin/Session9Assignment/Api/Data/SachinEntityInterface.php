<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Api\Data;

interface SachinEntityInterface
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
     * Get Height
     *
     * @return float
     */
    public function getHeight();

    /**
     * Get Long Description
     *
     * @return string
     */
    public function getLongDescription();

    /**
     * Get Short Description
     *
     * @return string
     */
    public function getShortDesciption();

    /**
     * Is Employeed
     *
     * @return int
     */
    public function isEmployee();
}
