<?php

namespace Zanshin\Providers;

use Pimple\Container;
use PHPRouter\Router;
use PHPRouter\RouteCollection;
use Pimple\ServiceProviderInterface;
use Zanshin\Components\Router\PhpRouterComponent;

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
     */
    public function register(Container $container)
    {
        $container["Router"] = function ($c) {
            return new Router($c["RouteCollection"]);
        };

        $container["RouteCollection"] = function ($c) {
            return new RouteCollection();
        };

        $container["RouterContract"] = function ($c) {
            return new PhpRouterComponent($c["Router"], $c["RouteCollection"]);
        };
    }

}