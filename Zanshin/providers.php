<?php

use Zanshin\Providers\RouterProvider;
use Zanshin\Providers\ApplicationProvider;
use Zanshin\Providers\SessionProvider;
use Zanshin\Providers\InputProvider;

/**
 * Where all the services are prepared and registered
 * on the app's dependency injection container.
 */

// Register .env as a service.
container()["Dotenv"] = function ($c) {
    return new \Dotenv\Dotenv(__DIR__ . "/../");
};

container()->register(new ApplicationProvider()); // Application

container()->register(new RouterProvider()); // AltoRouterComponent

container()->register(new SessionProvider()); // NativeSessionComponent

container()->register(new InputProvider()); // InputComponent
