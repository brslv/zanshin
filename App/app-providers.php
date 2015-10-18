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
 */
container()["\App\Controllers\HomeController"] = function ($c) {
    return new \App\Controllers\HomeController($c["InputContract"]);
};
