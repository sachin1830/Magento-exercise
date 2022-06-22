<?php

namespace Custom\Test\Api;

use Magento\Catalog\Api\Data\ProductInterface;

/**
 * @api
 */
interface ProductRepositoryInterface
{
    /**
     * Create product
     *
     * @param ProductInterface $product
     * @param bool $saveOptions
     * @return ProductInterface
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(ProductInterface $product, $saveOptions = false);

    /**
     * Get info about product by product SKU
     *
     * @param string $sku
     * @param bool $editMode
     * @param int|null $storeId
     * @param bool $forceReload
     * @return ProductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($sku, $editMode = false, $storeId = null, $forceReload = false);

    /**
     * Get info about product by product id
     *
     * @param int $productId
     * @param bool $editMode
     * @param int|null $storeId
     * @param bool $forceReload
     * @return ProductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($productId, $editMode = false, $storeId = null, $forceReload = false);

    /**
     * Delete product
     *
     * @param ProductInterface $product
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\StateException
     */
    public function delete(ProductInterface $product);

    /**
     * @param string $sku
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function deleteById($sku);
}
