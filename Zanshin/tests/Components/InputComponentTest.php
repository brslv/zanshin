<?php

namespace Zanshin\tests;

use Zanshin\Components\Input\InputComponent;

/**
 * Class InputTest
 *
 * @author brslv
 * @package Zanshin\tests;
 */
class InputTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $_GET["foo"] = "bar";
        $_POST["baz"] = "fiz";
    }

    public function testItCanCreateFromGlobals() 
    {
        $this->input = new InputComponent();

        $this->assertNotEmpty($this->input->get());
        $this->assertNotEmpty($this->input->post());
    }

    public function testItCanFetchValuesFromGet()
    {
        $this->input = new InputComponent();

        $foo = $this->input->get("foo");

        $this->assertEquals("bar", $foo);
    }

    public function testItCanFetchValuesFromPost()
    {
        $this->input = new InputComponent();

        $baz = $this->input->post("baz");

        $this->assertEquals("fiz", $baz);
    }

    public function testItReturnsNullIfNonexisingKeyProvided()
    {
        $this->inputs = new InputComponent();

        $nom = $this->inputs->get("nom");
        $yum = $this->inputs->post("yum");

        $this->assertNull($nom);
        $this->assertNull($yum);
    }

    public function testItCorrectlyPerformsHas()
    {
        $this->inputs = new InputComponent();

        $this->assertEquals(true, $this->inputs->has("post", "baz"));
        $this->assertEquals(true, $this->inputs->has("get", "foo"));
        $this->assertEquals(false, $this->inputs->has("post", "shiz"));
        $this->assertEquals(false, $this->inputs->has("get", "shiz"));
    }
}
