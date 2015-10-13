# Documentation

Zanshin is a minimalist PHP framework for developing basic web-applications.

## Tell me more.
-- to be added.

## How it works.
-- to be added.

## Routing
The routing with *Zanshin* is pretty simple, actually. Under the hood the framework uses AltoRouter - a lightweight, yet extremely flexible and powerful routing engine.

#### Registering routes
*Zanshin* uses a pretty minimalistic way for registering routes.

In the routes file **(App/routes.php)** you'll find a simple array. This is where you should put all the app's routes.

Here's how:

```php
<?php

// App/routes.php

return [

    ["GET", "/", "HomeController@index"],

];
```
