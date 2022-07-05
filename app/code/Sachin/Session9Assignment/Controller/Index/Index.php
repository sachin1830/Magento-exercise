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
        $resultJson = $this->jsonFactory->create();
        if (empty($id)) {
            $entityCollection  = $this->entityRepository->getCollection();
            $entities = [];
            foreach ($entityCollection as $entity) {
                $entities[] = [
                    'id' =>$entity->getId(),
                    'name' => $entity->getName(),
                    'age' => $entity->getAge(),
                    'height' => $entity->getHeight(),
                    'description' => $entity->getDescription(),
                    'created At' => $entity->getCreatedAt()
                ];
            }
            $resultJson->setData($entities);
            return $resultJson;
        } else {
            $result = $this->entityRepository->getById($id);
            if (!$result->getId()) {
                throw new NoSuchEntityException(__('Unable to find the entity with this id.'));

            } else {
                return $resultJson->setData([
                    'id' => $result->getId(),
                    'name' => $result->getName(),
                    'age' => $result->getAge(),
                    'height' => $result->getHeight(),
                    'description' => $result->getDescription(),
                    'created At' => $result->getCreatedAt()
                ]);
            }
        }
    }
}
