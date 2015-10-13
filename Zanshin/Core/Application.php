<?php

namespace Zanshin\Core;

use Zanshin\Contracts\RouterContract;

/**
 * Class Application
 *
 * @author brslv
 * @package Zanshin\Core
 */
class Application
{

    /**
     * @var RouterContract
     */
    private $router;

    /**
     * Constructor.
     *
     * @param RouterContract $router
     */
    public function __construct(RouterContract $router)
    {
        $this->router = $router;
    }

    /**
     * Run.
     *
     * @return void
     */
    public function run()
    {
        echo "Running.";
    }

}