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
            $twigViewsDirectory = $this->normalizeDir($c["twig_views_directory"]);
            $twigViewsCacheDirectory = false;

            if ($c["twig_use_views_cache"] === true) {
                $twigViewsCacheDirectory = $this->normalizeDir("Views/cache");
            }

            $loader = new \Twig_Loader_Filesystem($twigViewsDirectory); // TODO: Extract in config
            $twig = new \Twig_Environment($loader, [
                'cache' => $twigViewsCacheDirectory, // TODO: Extract in config
            ]);

            return new TwigViewComponent($c["SessionContract"], $loader, $twig);
        };
    }

    private function normalizeDir($dir)
    {
        $_dir = ltrim($dir, "/");
        $_dir = ltrim($_dir, "\\");

        return realpath(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "App" . DIRECTORY_SEPARATOR . $_dir);
    }
}
