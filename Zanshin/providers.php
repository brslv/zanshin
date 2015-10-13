<?php

use Zanshin\Providers\RouterProvider;
use Zanshin\Providers\ApplicationProvider;

/**
 * Where all the services are prepared and registered
 * on the app's dependency injection container.
 */

container()->register(new ApplicationProvider()); // Application

container()->register(new RouterProvider()); // PhpRouterComponent
