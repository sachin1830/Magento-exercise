<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\Test\MagentoU;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Checkout\Model\Session;

class Test
{
    /**
     * @var bool
     */
    protected $justAParameter;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var \Custom\Test\Api\ProductRepositoryInterface
     */
    protected $customProductRepository;

    /**
     * Test constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param ProductFactory $productFactory
     * @param Session $session
     * @param \Custom\Test\Api\ProductRepositoryInterface $customProductRepository
     * @param bool $justAParameter
     * @param array $data
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        ProductFactory $productFactory,
        Session $session,
        \Custom\Test\Api\ProductRepositoryInterface $customProductRepository,
        $justAParameter = false,
        array $data = []
    ) {
        $this->justAParameter = $justAParameter;
        $this->data = $data;
        $this->customProductRepository = $customProductRepository;
    }
}
