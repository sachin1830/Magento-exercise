<?php

namespace Sachin\Session9Assignment\Model;

use Magento\Framework\Model\AbstractModel;
use Sachin\Session9Assignment\Model\ResourceModel\SachinEntity as ResourceModel;

class SachinEntity extends AbstractModel
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
