<?php

namespace Zanshin\tests;

use Zanshin\Components\Router\AltoRouterComponent;

/**
 * Class AltoRouterComponentTest
 *
 * @author brslv
 * @package Zanshin\tests
 */
class AltoRouterComponentTest extends \PHPUnit_Framework_TestCase
{

    private $router;

    public function setUp()
    {
        $this->router = new AltoRouterComponent();
    }

    public function testItCanGenerateUrlBasedOnRoute()
    {
        $this->router->add("GET", "/", "HomeController@index", "home");

        $url = $this->router->generate("home");

        $this->assertEquals("/", $url);
    }

}
