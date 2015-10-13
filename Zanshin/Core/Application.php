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
     * The default application routes.php file.
     */
    const DEFAULT_APPLICATION_ROUTES_FILE = "App/routes.php";

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
     * Sets the controllers namespace.
     *
     * @param string $namespace
     * @return $this
     */
    public function setControllersNamespace($namespace)
    {
        $this->router->setControllersNamespace($namespace);

        return $this;
    }

    /**
     * Run.
     *
     * @return void
     */
    public function run()
    {
        $routes = include self::DEFAULT_APPLICATION_ROUTES_FILE;

        $this->router->addSome($routes)->dispatch();
    }

}