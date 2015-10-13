<?php

/**
 * Register routes.
 *
 * Zanshin uses the minimalistic array syntax for route registering.
 * Simply type your routes as arrays in the format:
 *
 * ["_method_", "_route_", "_controller@action_"]
 *
 * Examples:
 * -----------------------------------------------------
 * ["GET", "/", "HomeController@index"],
 * ["POST", "/users", "UsersController@register"],
 * ["GET|POST", "/users/login", "UsersController@login"]
 * -----------------------------------------------------
 *
 * That's it.
 */

return [

    ["GET", "/", "HomeController@index"],

];
