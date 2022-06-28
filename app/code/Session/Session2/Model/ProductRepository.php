<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Session\Session2\Model;

use Magento\Catalog\Api\Data\ProductSearchResultsInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ResourceModel\Product;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Eav\Model\Entity\Collection\AbstractCollection;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Product
     */
    private Product $resourceModel;
    /**
     * @var ProductFactory
     */
    private ProductFactory $productFactory;
    /**
     * @var Collection
     */
    private Collection $collection;

    /**
     * ProductRepository constructor.
     *
     * @param Product $resourceModel
     * @param ProductFactory $productFactory
     * @param Collection $collection
     */
    public function __construct(
        Product $resourceModel,
        ProductFactory $productFactory,
        Collection $collection
    ) {
        $this->resourceModel = $resourceModel;
        $this->productFactory = $productFactory;
        $this->collection = $collection;
    }

    /**
     * Save
     *
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @param bool $saveOptions
     * @return \Magento\Catalog\Api\Data\ProductInterface|void
     */
    public function save(\Magento\Catalog\Api\Data\ProductInterface $product, $saveOptions = false)
    {
        return $this->resourceModel->save($product);
    }

    /**
     * Get
     *
     * @param string $sku
     * @param bool $editMode
     * @param int|null $storeId
     * @param bool $forceReload
     * @return \Magento\Catalog\Api\Data\ProductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * */
    public function get($sku, $editMode = false, $storeId = null, $forceReload = false)
    {
        $id = $this->resourceModel->getIdBySku($sku);
        return $this->getById($id);
    }

    /**
     * Get By id
     *
     * @param int $productId
     * @param boolean $editMode
     * @param int $storeId
     * @param boolean $forceReload
     * @return \Magento\Catalog\Api\Data\ProductInterface|Product
     */
    public function getById($productId, $editMode = false, $storeId = null, $forceReload = false)
    {
        $product = $this->productFactory->create();
        return $this->resourceModel->load($product, $productId);
    }

    /**
     * Delete
     *
     * @param \Magento\Catalog\Api\Data\ProductInterface $product
     * @return bool|Product|\Magento\Eav\Model\Entity\AbstractEntity
     * @throws \Exception
     */
    public function delete(\Magento\Catalog\Api\Data\ProductInterface $product)
    {
        return $this->resourceModel->delete($product);
    }

    /**
     * Delete By ID
     *
     * @param string $sku
     * @return bool|void
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById($sku)
    {
        $product = $this->get($sku);
        return $this->resourceModel->delete($product);
    }

    /**
     * Get List
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return ProductSearchResultsInterface|Product\Collection|AbstractCollection
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        return $collection = $this->collection->load();
    }
}
