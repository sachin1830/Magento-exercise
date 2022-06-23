<?php

namespace Custom\HelloWorld\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface ;
use Psr\Log\LoggerInterface;

class LogPageOutputObserver implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructer for ID
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Observer execute method for handle observre
     *
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $response = $observer->getEvent()->getData('response');
        $body = $response->getBody();
        $body = substr($body, 0, 1000);
        $this->logger->info("--------\n\n\n BODY \n\n\n ". $body, []);
    }
}
