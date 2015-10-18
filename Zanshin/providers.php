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

container()->register(new ApplicationProvider()); // Application

container()->register(new DotenvProvider()); // Dotenv

container()->register(new RouterProvider()); // AltoRouterComponent

container()->register(new SessionProvider()); // NativeSessionComponent

container()->register(new InputProvider()); // InputComponent

container()->register(new ViewProvider()); // TwigViewComponent
