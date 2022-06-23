<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit3\HelloWorldBlock\Block;

use Magento\Framework\View\Element\AbstractBlock;

class MyBlock extends AbstractBlock
{
    /**
     * _toHtml method implementation
     *
     * @return string
     */
    protected function _toHtml(): string
    {
        return "<b>Hello world from the block!</b>";
    }
}
