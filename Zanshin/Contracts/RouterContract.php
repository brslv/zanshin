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
     * @param $httpMethod
     * @param $_route
     * @param $controller
     * @param $action
     * @return mixed
     */
    public function add($httpMethods, $_route, $action);

    /**
     * Performs a dispatching mechanism.
     *
     * @return mixed
     */
    public function dispatch();

}