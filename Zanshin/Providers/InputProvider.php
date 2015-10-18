<?php

namespace Zanshin\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Zanshin\Components\Input\InputComponent;

/**
 * Class InputProvider
 *
 * @author brlsv
 * @package Zanshin\Providers
 */
class InputProvider implements ServiceProviderInterface
{
    /**
     * Registers a class, which implements the SessionContract
     * as a service provider on the IoC container.
     *
     * @param Container $container
     * @return InputComponent
     */
    public function register(Container $container)
    {
        $container["InputContract"] = function ($c) {
            return new InputComponent();
        };
    }
}
