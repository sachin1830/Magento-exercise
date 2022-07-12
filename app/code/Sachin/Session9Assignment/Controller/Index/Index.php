<?php

namespace Sachin\Session9Assignment\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Controller\Result\JsonFactory;
use Sachin\Session9Assignment\Model\SachinEntityRepository;
use Magento\Framework\App\RequestInterface;

class Index implements ActionInterface
{
    /**
     * @var JsonFactory
     */
    private JsonFactory $jsonFactory;
    /**
     * @var SachinEntityRepository
     */
    private SachinEntityRepository $entityRepository;
    /**
     * @var RequestInterface
     */
    private RequestInterface $request;

    /**
     * Index constructor.
     * @param JsonFactory $jsonFactory
     * @param SachinEntityRepository $entityRepository
     * @param RequestInterface $request
     */
    public function __construct(
        JsonFactory $jsonFactory,
        SachinEntityRepository $entityRepository,
        RequestInterface $request
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->entityRepository = $entityRepository;
        $this->request = $request;
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     * @throws NoSuchEntityException
     */
    public function execute()
    {
        $id = $this->request->getParam('id');
        $ids = explode(',', $id);
        $resultJson = $this->jsonFactory->create();
        if (!empty($ids) && count($ids)>1) {
            $entities = $this->entityRepository->getEnityRows($ids);
                $resultJson->setData($entities);
                return $resultJson;
        } elseif (empty($id)) {
            $entityCollection  = $this->entityRepository->getCollection();
            $resultJson->setData($entityCollection->getData());
            return $resultJson;
        } else {
            $result = $this->entityRepository->getById($id);
            if (empty($result)) {
                throw new NoSuchEntityException(__('Unable to find the entity with this id.'));

            } else {
                return $resultJson->setData($result);
            }
        }
    }
}
