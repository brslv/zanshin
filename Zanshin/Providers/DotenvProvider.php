<?php

namespace Zanshin\Providers;

use Dotenv\Dotenv;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class DotenvProvider
 *
 * @author brlsv
 * @package Zanshin\Providers
 */
class DotenvProvider implements ServiceProviderInterface
{
    /**
     * Registers the Dotenv as service provider.
     *
     * @param Container $container
     * @return Dotenv
     */
    public function register(Container $container)
    {
        $container["Dotenv"] = function ($c) {
            $dotenvFilePath = __DIR__ . "/../../";

            $dotenv = new Dotenv($dotenvFilePath);

            return $dotenv;
        };
    }
}
