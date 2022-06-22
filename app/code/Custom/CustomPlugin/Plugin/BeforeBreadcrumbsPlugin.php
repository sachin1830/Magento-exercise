<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\CustomPlugin\Plugin;

use Magento\Theme\Block\Html\Breadcrumbs;

class BeforeBreadcrumbsPlugin
{
    /**
     * Added  >> b >>in Breadcrumbs
     *
     * @param Breadcrumbs $subject
     * @param string $crumbName
     * @param array $crumbInfo
     * @return array
     */
    public function beforeAddCrumb(Breadcrumbs $subject, $crumbName, $crumbInfo)
    {
        $crumbInfo['label'] = $crumbInfo['label']. ' >> b >>';
        return [$crumbName, $crumbInfo];
    }
}


