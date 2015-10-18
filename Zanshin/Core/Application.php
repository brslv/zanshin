<?php

namespace Zanshin\Core;

use Dotenv\Dotenv;
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
     * @var Dotenv
     */
    private $env;

    /**
     * The default application routes.php file.
     */
    const DEFAULT_APPLICATION_ROUTES_FILE = "App/routes.php";

    /**
     * Constructor.
     *
     * @param RouterContract $router
     */
    public function __construct(RouterContract $router, Dotenv $env)
    {
        $this->router = $router;
        $this->env = $env;
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
        $this->env->load();
        $routes = include self::DEFAULT_APPLICATION_ROUTES_FILE;
       
        $this->router->addSome($routes)->dispatch();
    }

}
