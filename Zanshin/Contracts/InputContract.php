<?php

namespace Zanshin\Contracts;

/**
 * Interface InputContract
 *
 * @author brslv
 * @package Zanshin\Contracts
 */
interface InputContract
{
    /**
     * Get a value from the $_GET superglobal
     *
     * @param string|null $key
     * @return mixed
     */
    public function get($key = null);

    /**
     * Get a value from the $_POST superglobal.
     *
     * @param string|null $key
     * @return mixed
     */
    public function post($key = null);

    /**
     * Check if a value is present in $_GET or $_POST
     *
     * @param string $fromSuperglobal Either "post" or "get"
     * @param string $key The key to search for
     * @return bool
     */
    public function has($fromSuperglobal, $key);
}
