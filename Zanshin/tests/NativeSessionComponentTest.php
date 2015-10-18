<?php

namespace Zanshin\tests;

use Zanshin\Components\Session\NativeSessionComponent as Session;

/**
 * Class NativeSessionComponentTest
 *
 * @author brslv
 * @package Zanshin\Components\Session\NativeSessionComponent
 */
class NativeSessionComponentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testItCanStartSession()
    {
        $session = new Session("___session_test");
        $session->start();

        $sessionName = $session->getName();

        $this->assertEquals(true, $session->getIsStarted());
        $this->assertEquals("___session_test", $sessionName);
    }

    /**
     * @runInSeparateProcess
     */
    public function testItCanSetValuesToSession()
    {
        $session = new Session();
        $session->start();

        $session->set("foo", "bar");

        $this->assertEquals("bar", $session->get("foo"));
    }

    /**
     * @runInSeparateProcess
     */
    public function testItCanDestroySession()
    {
        $session = new Session();
        $session->start();

        $session->set("bar", "baz");

        $this->assertEquals("baz", $session->get("bar"));

        $session->destroy();

        $this->assertEmpty($_SESSION);
        $this->assertEquals(false, $session->getIsStarted());
    }

    /**
     * @expectedException Exception
     * @runInSeparateProcess
     */
    public function testItThrowsExceptionOnDestroyingNonActiveSession()
    {
        $session = new Session();
        $session->start();

        $session->destroy(); // should destroy session
        $session->destroy(); // should throw exception
    }

    /**
     * @expectedException Exception
     * @runInSeparateProcess
     */
    public function testItThrowsExceptionOnStartingAlreadyStartedSession()
    {
        $session = new Session();
        $session->start();

        $session->start(); // should throw exception
    }
    
}
