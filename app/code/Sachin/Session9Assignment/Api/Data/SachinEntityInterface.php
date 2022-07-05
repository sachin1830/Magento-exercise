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
    public const DESCRIPTION = 'description';
    public const CREATEDAT = 'created_at';
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
     * Get Description
     *
     * @return string
     */
    public function getDescription();
}
