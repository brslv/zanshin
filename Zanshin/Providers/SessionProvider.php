<?php

namespace Zanshin\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Zanshin\Components\Session\NativeSessionComponent;

/**
 * Class SessionProvider
 *
 * @author brlsv
 * @package Zanshin\Providers
 */
class SessionProvider implements ServiceProviderInterface
{
    /**
     * Registers a class, which implements the SessionContract
     * as a service provider on the IoC container.
     *
     * @param Container $container
     * @return NativeSessionComponent
     */
    public function register(Container $container)
    {
        $container["SessionContract"] = function ($c) {
            return new NativeSessionComponent();
        };
    }
}
