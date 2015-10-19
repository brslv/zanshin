<?php

use Zanshin\Providers\RouterProvider;
use Zanshin\Providers\ApplicationProvider;
use Zanshin\Providers\DotenvProvider;
use Zanshin\Providers\SessionProvider;
use Zanshin\Providers\InputProvider;
use Zanshin\Providers\ViewProvider;

/**
 * Providers.
 *
 * The folloing rows register the core framework's service providers.
 */

// The base controller, extended if app's controllers
// are not registered as services in app-providers.
$container["\\Zanshin\\Components\\Controller\\ControllerComponent"] = function ($c) {
    return new \Zanshin\Components\Controller\ControllerComponent($c["ViewContract"],
        $c["InputContract"],
        $c["SessionContract"]);
};

$container["\\App\\Controllers\\HomeController"] = function ($c) {
    return new \App\Controllers\HomeController($c["ViewContract"], $c["InputContract"], $c["SessionContract"]);
};

container()->register(new ApplicationProvider()); // Application

container()->register(new DotenvProvider()); // Dotenv

container()->register(new RouterProvider()); // AltoRouterComponent

container()->register(new SessionProvider()); // NativeSessionComponent

container()->register(new InputProvider()); // InputComponent

container()->register(new ViewProvider()); // TwigViewComponent
