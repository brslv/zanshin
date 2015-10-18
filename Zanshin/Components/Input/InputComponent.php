<?php

namespace Zanshin\Components\Input;

use Zanshin\Contracts\InputContract;

/**
 * Class InputComponent
 *
 * @author brslv
 * @package Zanshin\Components\Input
 */
class InputComponent implements InputContract
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
     * Allowed superglobals.
     *
     * @var array
     */
    protected $superglobalsWhitelist = [
        "get",
        "post",
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
     * Check if a value is present in $_GET or $_POST
     *
     * @param string $fromSuperglobal Either "post" or "get"
     * @param string $key The key to search for
     * @return bool
     */
    public function has($fromSuperglobal, $key)
    {
        return ! is_null($this->fetch($fromSuperglobal, $key));
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
        $fromSuperglobal = strtolower($fromSuperglobal);

        if ( ! in_array($fromSuperglobal, $this->superglobalsWhitelist)) {
            throw new \Exception(sprintf("No such superglobal: %s", $fromSuperglobal), 500);
        }

        if ( ! is_null($key)) {
            if (isset($this->inputs[$fromSuperglobal][$key])) {
                return $this->inputs[$fromSuperglobal][$key];
            }

            return null;
        }

        return $this->inputs[$fromSuperglobal];
    }
}
