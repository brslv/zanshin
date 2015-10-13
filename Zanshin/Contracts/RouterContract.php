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
     * @param $httpMethods
     * @param $route
     * @param $action
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
     * Performs a dispatching mechanism.
     *
     * @return mixed
     */
    public function dispatch();

    /**
     * Sets the controller namespace for the app.
     *
     * @param $namespace
     * @return mixed
     */
    public function setControllersNamespace($namespace);

}