<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Custom\CustomNotFound\Controller\NoRouteHandler;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Router\NoRouteHandlerInterface ;

class NoRouteHandler implements NoRouteHandlerInterface
{
    /**
     * Process No route
     *
     * @param RequestInterface $request
     * @return bool
     */
    public function process(RequestInterface $request): bool
    {
        if ($request->getFrontName() == 'admin') {
            return false;
        }

        $moduleName = 'cms';
        $controllerName = 'index';
        $actionName = 'index';
        $request
            ->setModuleName($moduleName)
            ->setControllerName($controllerName)
            ->setActionName($actionName);

        return true;
    }
}
