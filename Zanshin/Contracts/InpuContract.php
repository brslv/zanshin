<?php

namespace Zanshin\Contracts;

/**
 * Interface RouterContract
 *
 * @author brslv
 * @package Zanshin\Contracts
 */
interface RouterContract
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
