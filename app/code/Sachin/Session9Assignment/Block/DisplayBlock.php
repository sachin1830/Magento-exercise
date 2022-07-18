<?php

namespace Sachin\Session9Assignment\Block;

use Magento\Framework\View\Element\Template;
use Sachin\Session9Assignment\Api\Data\SachinEntitySearchResultInterface;
use Sachin\Session9Assignment\Model\SachinEntityRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;

class DisplayBlock extends Template
{
    /**
     * @var SachinEntityRepository
     */
    private SachinEntityRepository $entityRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * DisplayBlock constructor.
     *
     * @param Template\Context $context
     * @param SachinEntityRepository $entityRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        SachinEntityRepository $entityRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->entityRepository = $entityRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Get Entities
     *
     * @return SachinEntitySearchResultInterface|void
     */
    public function getEntities()
    {
        return $entities = $this->entityRepository->getList($this->searchCriteriaBuilder->create());
    }

    /**
     * Get Action Url
     *
     * @return string
     */
    public function getActionUrl()
    {
        return $this->getUrl('sachin/index/save');
    }

    /**
     * Get form url
     *
     * @return string
     */
    public function getFormUrl()
    {
        return $this->getUrl('sachin/index/form');
    }

    /**
     * Get Entity
     *
     * @return \Sachin\Session9Assignment\Api\Data\SachinEntityInterface|null
     */
    public function getEntity()
    {
        $id = $this->getRequest()->getParam('id');
        return $this->entityRepository->getById($id);
    }

    /**
     * Get delete url
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('sachin/index/delete');
    }
}
