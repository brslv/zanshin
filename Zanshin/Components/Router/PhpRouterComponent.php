<?php

namespace Zanshin\Components\Router;

use PHPRouter\Router;
use PHPRouter\RouteCollection;
use Zanshin\Contracts\RouterContract;

/**
 * Class PhpRouterComponent
 *
 * A simple wrapper class around the PHP-Router
 * functionality by dannyvankooten.
 *
 * @author brslv
 * @package Zanshin\Components\Router
 */
class PhpRouterComponent implements RouterContract
{

    /**
     * @var Router
     */
    private $router;

    /**
     * @var RouteCollection
     */
    private $routeCollection;

    /**
     * Constructor.
     *
     * @param Router $router
     * @param RouteCollection $routeCollection
     */
    public function __construct(Router $router, RouteCollection $routeCollection)
    {
        $this->router = $router;
        $this->routeCollection = $routeCollection;
    }

    public function add($httpMethod, $route, $controller, $action)
    {
        // TODO: add method implementation.
        // Use as a reference: https://github.com/dannyvankooten/PHP-Router
    }

    public function match()
    {
        // TODO: add method implementation.
        // Use as a reference: https://github.com/dannyvankooten/PHP-Router
    }

}