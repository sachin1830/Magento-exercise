<?php

namespace Session\Session2\Controller\Index;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Index implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * Index constructor.
     * @param ResultFactory $resultFactory
     */
    public function __construct(ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    /**
     * Execute Method
     *
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
