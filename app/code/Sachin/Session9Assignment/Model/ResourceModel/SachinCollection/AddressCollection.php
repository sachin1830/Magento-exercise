<?php

namespace Sachin\Session9Assignment\Model\ResourceModel\SachinCollection;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Sachin\Session9Assignment\Model\ResourceModel\AddressEntity as ResourceModel;
use Sachin\Session9Assignment\Model\AddressEntity as Model;

class AddressCollection extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
