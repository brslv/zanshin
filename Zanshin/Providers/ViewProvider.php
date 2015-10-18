<?php

namespace Zanshin\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Zanshin\Components\View\TwigViewComponent;

/**
 * Class ViewProvider
 *
 * @author brlsv
 * @package Zanshin\Providers
 */
class ViewProvider implements ServiceProviderInterface
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
        $container["ViewContract"] = function ($c) {
            $twigViewsDirectory = realpath(__DIR__ . "/../../App/" . $c["twig_views_directory"]);

            $loader = new \Twig_Loader_Filesystem($twigViewsDirectory); // TODO: Extract in config
            $twig = new \Twig_Environment($loader, [
                'cache' => $c["twig_views_cache_folder"], // TODO: Extract in config
            ]);

            return new TwigViewComponent($c["SessionContract"], $loader, $twig);
        };
    }
}
