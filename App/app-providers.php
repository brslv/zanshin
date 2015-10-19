<?php

/**
 * App service providers.
 *
 * Register your service providers in this section.
 */

// App providers go here...

/**
 * Controller as a service.
 *
 * Register your controllers as services in this section.
 *
 * You can check out some of the available services you can pass as dependencies
 * to your container in the Zanshin/providers.php file.
 */

$container["\\App\\Controllers\\HomeController"] = function ($c) {
    return new \App\Controllers\HomeController($c["ViewContract"]);
};
