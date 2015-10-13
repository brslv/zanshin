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
     * The default base path.
     */
    const DEFAULT_BASE_PATH = "/";

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->routeCollection = new RouteCollection();
        $this->controllerNamespace = self::DEFAULT_CONTROLLER_NAMESPACE;
    }

    /**
     * Sets the controller namespace.
     *
     * @param string $namespace
     * @return $this
     * @throws \Exception
     */
    public function setControllersNamespace($namespace)
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
     * @param null|string $name
     * @return mixed
     */
    public function add($httpMethods, $route, $action, $name = null)
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
     * Add many routes form array.
     *
     * @param array $routes
     * @return $this
     */
    public function addSome(array $routes)
    {
        foreach ($routes as $route) {
            if (is_array($route) && count($route) == 3) {
                $_method = $route[0];
                $_route = $route[1];
                $_action = $route[2];

                $this->add($_method, $_route, $_action);
            }
        }

        return $this;
    }

    /**
     * Performs a dispatching mechanism.
     *
     * @return void
     */
    public function dispatch()
    {
        $this->router = new Router($this->routeCollection);

        $this->router->setBasePath(self::DEFAULT_BASE_PATH);

        if ( ! $this->router->matchCurrentRequest()) {
            // 404.
            // TODO: Abstract the http_response_code function in a Response class.

            http_response_code(404);

            echo "404. Page not found.";
        }
    }

    /**
     * @return Router
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @return RouteCollection
     */
    public function getRouteCollection()
    {
        return $this->routeCollection;
    }

    /**
     * @return string
     */
    public function getControllerNamespace()
    {
        return $this->controllerNamespace;
    }

}