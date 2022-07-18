<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Controller\Index;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Sachin\Session9Assignment\Api\SachinEntityRepositoryInterface;

class Delete implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var RequestInterface
     */
    private RequestInterface $request;
    /**
     * @var RedirectFactory
     */
    private RedirectFactory $redirectFactory;
    /**
     * @var ManagerInterface
     */
    private ManagerInterface $messageManager;
    /**
     * @var SachinEntityRepositoryInterface
     */
    private SachinEntityRepositoryInterface $sachinEntityRepository;

    /**
     * Delete constructor.
     *
     * @param RequestInterface $request
     * @param RedirectFactory $redirectFactory
     * @param ManagerInterface $messageManager
     * @param SachinEntityRepositoryInterface $sachinEntityRepository
     */
    public function __construct(
        RequestInterface $request,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager,
        SachinEntityRepositoryInterface $sachinEntityRepository
    ) {
        $this->request = $request;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
        $this->sachinEntityRepository = $sachinEntityRepository;
    }

    /**
     * Execute
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $entityId = $this->request->getParam('id');
        $this->sachinEntityRepository->deleteById($entityId);
        $this->messageManager->addSuccessMessage("Entity deleted successfully");
        return $this->redirectFactory->create()->setPath('sachin/index/display');
    }
}
