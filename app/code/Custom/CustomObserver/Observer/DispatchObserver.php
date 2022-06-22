<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\CustomObserver\Observer;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class DispatchObserver implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * Log constructor.
     * @param LoggerInterface $logger
     * @param RequestInterface $request
     */
    public function __construct(
        LoggerInterface $logger,
        RequestInterface $request
    ) {
        $this->logger = $logger;
        $this->request = $request;
    }

    /**
     * Execute
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $this->logger->log(300, "My custom event ");
    }
}
