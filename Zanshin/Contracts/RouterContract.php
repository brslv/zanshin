<?php

namespace Zanshin\Contracts;

/**
 * Interface RouterContract
 *
 * @author brslv
 * @package Zanshin\Contracts
 */
interface RouterContract
{

    /**
     * Adds a new route to the routes collection.
     *
     * @param string $httpMethods
     * @param string $route
     * @param string $action
     * @param string|null $name
     * @return mixed
     */
    public function add($httpMethods, $route, $action, $name = null);

    /**
     * Allows the user to add many routes, using array.
     *
     * @param array $routes
     * @return mixed
     */
    public function addSome(array $routes);

    /**
     * Generates a url for a given route.
     *
     * @param string $route
     * @param array $params
     * @return mixed
     */
    public function generate($route, array $params = []);

    /**
     * Performs a dispatching mechanism.
     *
     * @return mixed
     */
    public function dispatch();

    /**
     * Sets the controller namespace for the app.
     *
     * @param string $namespace
     * @return mixed
     */
    public function setControllersNamespace($namespace);

}