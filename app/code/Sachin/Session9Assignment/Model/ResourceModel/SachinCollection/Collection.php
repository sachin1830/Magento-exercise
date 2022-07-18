<?php

namespace Sachin\Session9Assignment\Model\ResourceModel\SachinCollection;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sachin\Session9Assignment\Model\ResourceModel\SachinEntity as ResourceModel;
use Sachin\Session9Assignment\Model\SachinEntity as Model;

class Collection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
