<?php

use Zanshin\Providers\RouterProvider;
use Zanshin\Providers\ApplicationProvider;
use Zanshin\Providers\DotenvProvider;
use Zanshin\Providers\SessionProvider;
use Zanshin\Providers\InputProvider;

/**
 * Where all the services are prepared and registered
 * on the app's dependency injection container.
 */

container()->register(new ApplicationProvider()); // Application

container()->register(new DotenvProvider()); // Dotenv

container()->register(new RouterProvider()); // AltoRouterComponent

container()->register(new SessionProvider()); // NativeSessionComponent

container()->register(new InputProvider()); // InputComponent
