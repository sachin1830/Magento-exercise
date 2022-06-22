<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\CustomPlugin\Plugin;

use Magento\Theme\Block\Html\Breadcrumbs;

class AroundBreadcrumbsPlugin
{
    /**
     * Added << a >> in Breadcrumbs
     *
     * @param Breadcrumbs $subject
     * @param callable $proceed
     * @param string $crumbName
     * @param array $crumbInfo
     */
    public function aroundAddCrumb(
        Breadcrumbs $subject,
        callable $proceed,
        $crumbName,
        $crumbInfo
    ) {
        $crumbInfo['label'] = $crumbInfo['label'].'<< a >>';
        $proceed($crumbName, $crumbInfo);
    }
}
