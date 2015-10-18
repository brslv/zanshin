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
}
