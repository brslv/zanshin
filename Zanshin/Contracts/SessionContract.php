<?php

namespace Zanshin\Contracts;

/**
 * Interface SessionContract.
 *
 * @author brslv
 * @package Zanshin\Contracts;
 */
interface SessionContract
{
    public function start();

    public function destroy();

    public function get($value);

    public function set($key, $value);

    public function has($key);

    public function remove($key);
    // TODO: add has($key) method.
}
