<?php

/**
 * Some useful helper functions.
 */

if ( ! function_exists("container")) {

    /**
     * Returns the app's IoC container.
     *
     * @param null|string $thing    A provider/config to be resolved.
     * @return \Pimple\Container    The IoC container.
     */
    function container($thing = null) {
        static $container = null;

        if (is_null($container)) {
            $container = new \Pimple\Container();

            require __DIR__ . "/../providers.php";
            require __DIR__ . "/../config.php";
            require __DIR__ . "/../../App/config.php";
        }

        return is_null($thing) || ! is_string($thing) ? $container : $container[$thing];
    }
}

if ( ! function_exists("urlFor")) {

    /**
     * Quick and easy way to generate url for a specific route.
     *
     * @param string $route
     * @return mixed
     */
    function urlFor($route) {
        return container("RouterContract")->generate($route);
    }
}
