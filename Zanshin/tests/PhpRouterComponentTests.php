<?php

namespace Zanshin\tests;

use Zanshin\Components\Router\PhpRouterComponent;

include "vendor/autoload.php";

class PhpRouterComponentTests extends \PHPUnit_Framework_TestCase
{

    /**
     * @var PhpRouterComponent
     */
    public $router;

    public function setUp()
    {
        $this->router = new PhpRouterComponent();
    }

    public function testItCanSetControllerNamespace()
    {
        $this->router->setControllersNamespace("\\Random\\Namespace");

        $this->assertEquals("\\Random\\Namespace\\", $this->router->getControllerNamespace());
    }

    public function testItCanAddManyRoutesThroughAddSomeMethod()
    {
        $routes = [
            ["GET", "/", "HomeController@index"],
            ["POST", "/users", "UsersController@register"],
        ];

        $this->router->addSome($routes);

        $this->assertEquals(2, $this->router->getRouteCollection()->count());
    }

}