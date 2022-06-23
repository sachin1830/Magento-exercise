<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\HelloWorld\Controller\Index;

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
     * Execute
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents('Hello World');
        return $result;
    }
}
