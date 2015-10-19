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
     * Add a new pattern to the existing ones.
     *
     * @param $alias
     * @param $pattern
     * @return mixed
     */
    public function addPattern($alias, $pattern);

    /**
     * Generates a url for a given route.
     *
     * @param string $route
     * @param array $params
     * @return mixed
     */
    public function generate($route, array $params = []);

    /**
     * Sets the controller namespace for the app.
     *
     * @param string $namespace
     * @return mixed
     */
    public function setControllersNamespace($namespace);

    /**
     * Performs a dispatching mechanism.
     *
     * @return mixed
     */
    public function dispatch();

    /**
     * Generates the path for the default view, extracted from the controller and action.
     * Stores it in the session, for future use.
     *
     * @param $controller
     * @param $action
     * @return mixed
     */
    public function generatePathForDefaultView($controller, $action);

}