<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 **/

namespace Sachin\Assignment5\Plugin;

use Magento\Checkout\Controller\Cart\CouponPost as Subject;

class CouponPost extends Subject
{
    /**
     * Around Execute
     *
     * @param Subject $subject
     */
    public function aroundExecute(Subject $subject)
    {
        $couponCode = trim($subject->getRequest()->getParam('coupon_code'));

        if ($couponCode) {
            $subject->messageManager->addErrorMessage(
                sprintf('The coupon code %s is not valid.', $couponCode)
            );
        } else {
            $subject->messageManager->addErrorMessage(
                'The coupon code is not valid.'
            );
        }
        return $subject->_goBack();
    }
}
