<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit3\HelloWorldBlock\Controller\Block;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;
    /**
     * @var ResultFactory
     */
    private $resultFactory;

    /**
     * Index constructor.
     *
     * @param PageFactory $pageFactory
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        PageFactory $pageFactory,
        ResultFactory $resultFactory
    ) {
        $this->pageFactory = $pageFactory;
        $this->resultFactory = $resultFactory;
    }

    /**
     * Index execute method
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $layout = $this->pageFactory->create()->getLayout();
        $block = $layout->createBlock('Unit3\HelloWorldBlock\Block\MyBlock');
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());
        return $result;
    }
}
