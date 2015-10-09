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

    public function add($httpMethod, $route, $controller, $action);

    public function match();

}