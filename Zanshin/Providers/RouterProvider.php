<?php

namespace Zanshin\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Zanshin\Components\Router\AltoRouterComponent;

/**
 * Class RouterProvider
 *
 * @author brslv
 * @package Zanshin\Providers
 */
class RouterProvider implements ServiceProviderInterface
{

    /**
     * Registers a class, which implements the RouterContract
     * as a service provider on the IoC container.
     *
     * @param Container $container
     * @return AltoRouterComponent
     */
    public function register(Container $container)
    {
        $container["RouterContract"] = function ($c) {
            return new AltoRouterComponent();
        };
    }

}
