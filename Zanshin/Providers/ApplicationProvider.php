<?php

namespace Zanshin\Providers;

use Pimple\Container;
use Zanshin\Core\Application;
use Pimple\ServiceProviderInterface;

/**
 * Class ApplicationProvider
 *
 * @author brlsv
 * @package Zanshin\Providers\ApplicationProvider
 */
class ApplicationProvider implements ServiceProviderInterface
{

    /**
     * Registers the Application class
     * as a service provider on the
     * IoC container.
     *
     * @param Container $container
     */
    public function register(Container $container)
    {
        $container["Application"] = function ($c) {
            return new Application($c["RouterContract"], $c["Dotenv"]);
        };
    }

}
