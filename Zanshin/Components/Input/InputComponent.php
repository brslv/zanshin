<?php

namespace Zanshin\Components\Input;

/**
 * Class InputComponent
 *
 * @author brslv
 * @package Zanshin\Components\Input
 */
class InputComponent
{
    /**
     * Holds the $_GET and $_POST values.
     *
     * @var array
     */
    protected $inputs = [
        "get" => [],
        "post" => [],
    ];

    /**
     * Constructor.
     *
     * Fills the inputs array with values from the superglobals.
     */
    public function __construct()
    {
        $this->inputs["get"] = $_GET;
        $this->inputs["post"] = $_POST;       
    }

    /**
     * Get a value from the $_GET superglobal.
     *
     * @param string $key The key to look for in $_GET.
     * @return mixed
     */
    public function get($key = null)
    {
        return $this->fetch("get", $key);
    }

    /**
     * Get a value from the $_POST superglobal.
     * 
     * @param string $key The key to look for in $_POST.
     * @return mixed
     */
    public function post($key = null)
    {
        return $this->fetch("post", $key);
    }

    /**
     * Fetch a value from the inputs array.
     * 
     * @param string $fromSuperglobal The superglobal to fetch value from.
     * @param string $key The key to look for in $_POST.
     * @return mixed|null
     */
    private function fetch($fromSuperglobal, $key = null)
    {
        if ( ! is_null($key)) {
            if (isset($this->inputs[$fromSuperglobal][$key])) {
                return $this->inputs[$fromSuperglobal][$key];
            }

            return null;
        }

        return $this->inputs[$fromSuperglobal];
    }
}
