<?php

namespace Zanshin\Components\Router;

use PHPRouter\Route;
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
     * @var string
     */
    private $controllerNamespace;

    /**
     * The default controller namespace.
     */
    const DEFAULT_CONTROLLER_NAMESPACE = '\App\Controllers\\';

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->routeCollection = new RouteCollection();
        $this->controllerNamespace = self::DEFAULT_CONTROLLER_NAMESPACE;
    }

    /**
     * Sets the controller folder.
     *
     * @param string $namespace
     * @return $this
     * @throws \Exception
     */
    public function setControllerNamespace($namespace)
    {
        $_namespace = $this->normalizeNamespace($namespace);

        if ( ! is_string($_namespace) || empty($_namespace) || is_null($_namespace)) {
            throw new \Exception("Controller namespace cannot be empty or non-string value.", 500);
        }

        $this->controllerNamespace = $_namespace;

        return $this;
    }

    /**
     * Normalizes a given namespace.
     *
     * @param $namespace
     * @return string
     */
    private function normalizeNamespace($namespace)
    {
        $_namespace = trim($namespace);
        return rtrim($_namespace, "\\") . "\\";
    }

    /**
     * Adds new route to the routes collection.
     *
     * @param string $httpMethods HTTP methods, separated by "|"
     * @param string $route
     * @param string $action In the format "SomeController@action"
     * @return mixed
     */
    public function add($httpMethods, $route, $action)
    {
        $_route = $this->normalizeRoute($route);
        $_action = $this->normalizeAction($action);
        $_methods = $this->extractMethods($httpMethods);

        $_route = new Route($_route, [
            "_controller" => $this->controllerNamespace . $_action,
            "methods" => $_methods,
        ]);

        $this->routeCollection->attachRoute($_route);
    }

    /**
     * Normalizes trailing slashes.
     *
     * @param string $route
     * @return string string
     */
    private function normalizeRoute($route)
    {
        return rtrim($route, "/") . "/";
    }

    /**
     * Normalizes action in the format PHP-Router requires.
     *
     * @param string $action
     * @return string
     */
    private function normalizeAction($action)
    {
        return preg_replace("/@/", "::", $action);
    }

    /**
     * Extracts the methods from the give string parameter.
     * @param string $httpMethods
     * @return array
     */
    private function extractMethods($httpMethods)
    {
        return explode("|", $httpMethods);
    }

    /**
     * Performs a dispatching mechanism.
     *
     * @return void
     */
    public function dispatch()
    {
        $this->setControllerNamespace('\Zanshin\Controllers');
        $this->add("GET", "/aloha", "HomeController@aloha");

        $this->router = new Router($this->routeCollection);
        $this->router->setBasePath("/");
        $route = $this->router->matchCurrentRequest();

        var_dump($route);
    }

}