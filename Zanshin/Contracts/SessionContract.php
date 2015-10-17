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
}
