<?php

namespace Sachin\Session9Assignment\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class AddressEntity extends AbstractDb
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('sachin_address', 'address_id');
    }
}
