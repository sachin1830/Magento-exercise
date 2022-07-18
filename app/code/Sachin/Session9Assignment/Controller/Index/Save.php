<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Sachin\Session9Assignment\Controller\Index;

use Sachin\Session9Assignment\Api\Data\SachinEntityInterface;
use Sachin\Session9Assignment\Api\SachinEntityRepositoryInterface;
use Magento\Framework\App\RequestInterface;
use Sachin\Session9Assignment\Api\Data\SachinEntityInterfaceFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;

class Save implements \Magento\Framework\App\ActionInterface
{
    /**
     * @var SachinEntityRepositoryInterface
     */
    private SachinEntityRepositoryInterface $sachinEntityRepository;
    /**
     * @var RequestInterface
     */
    private RequestInterface $request;
    /**
     * @var SachinEntityInterfaceFactory
     */
    private SachinEntityInterfaceFactory $sachinEntityFactory;
    /**
     * @var RedirectFactory
     */
    private RedirectFactory $redirectFactory;
    /**
     * @var ManagerInterface
     */
    private ManagerInterface $messageManager;

    /**
     * Save constructor.
     *
     * @param SachinEntityRepositoryInterface $sachinEntityRepository
     * @param RequestInterface $request
     * @param SachinEntityInterfaceFactory $sachinEntityFactory
     * @param RedirectFactory $redirectFactory
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        SachinEntityRepositoryInterface $sachinEntityRepository,
        RequestInterface $request,
        SachinEntityInterfaceFactory $sachinEntityFactory,
        RedirectFactory $redirectFactory,
        ManagerInterface $messageManager
    ) {
        $this->sachinEntityRepository = $sachinEntityRepository;
        $this->request = $request;
        $this->sachinEntityFactory = $sachinEntityFactory;
        $this->redirectFactory = $redirectFactory;
        $this->messageManager = $messageManager;
    }

    /**
     * Execute
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $id = $this->request->getParam('id');
        $entity = '';
        if (!empty($id)) {
            $entity = $this->sachinEntityRepository->getById($id);
        } else {
            $entity = $this->sachinEntityFactory->create();
        }
        $result = $this->saveEntity($entity, $this->request->getParams());
        $redirect = $this->redirectFactory->create();
        if ($result) {
            $this->messageManager->addSuccessMessage("Entity save successfully");
            return $redirect->setPath('sachin/index/display');
        } else {
            $this->messageManager->addErrorMessage("Failed to save entity");
            return $redirect->setPath('sachin/index/display');
        }
    }

    /**
     * Save Entity
     *
     * @param SachinEntityInterface $entity
     * @param array $params
     */
    public function saveEntity($entity, $params)
    {
        $entity->setName($params['name']);
        $entity->setAge((int)$params['age']);
        $entity->setHeight($params['height']);
        $entity->setIsEmployee($params['is_employee'] == 'employee');
        $entity->setShortDesciption($params['short_description']);
        $entity->setLongDescription($params['long_description']);
        return $this->sachinEntityRepository->save($entity);
    }
}
