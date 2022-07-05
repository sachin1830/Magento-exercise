<?php

namespace Sachin\Session9Assignment\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SachinEntity extends AbstractDb
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('sachin_entity', 'entity_id');
    }
}
