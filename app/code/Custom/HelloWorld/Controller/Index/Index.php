<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\HelloWorld\Controller\Index;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Index implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $pageFactory;
    /**
     * @var \Magento\Framework\Controller\ResultFactory
     */
    private $resultFactory;

    /**
     * Index constructor.
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Framework\Controller\ResultFactory $resultFactory
     */
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Controller\ResultFactory $resultFactory
    ) {
        $this->pageFactory = $pageFactory;
        $this->resultFactory = $resultFactory;
    }

    /**
     * Execute
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents('Hello World');
        return $result;
    }
}
