<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\HelloWorldRedirect\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Index extends Action
{
    /**
     * Execute redirect
     */
    public function execute()
    {
        $this->_redirect('catalog/category/edit/id/3');
    }
}
