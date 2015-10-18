# Documentation

Zanshin is a minimalist PHP framework for developing basic web-applications.

## Tell me more.
-- to be added.

## How it works.
-- to be added.

## Routing
Routing with *Zanshin* is pretty simple, actually. Under the hood the framework uses [AltoRouter](http://altorouter.com) - a lightweight, yet extremely flexible and powerful routing engine.

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

The code above registers a single route, pointing to the **HomeController's index method**. There will be a valid match only if the request is **HTTP GET** on the **http://app.com/** url.

#### Multiple HTTP methods
Sometimes you'll need a way to make a certain controller/action pair respond to multiple HTTP methods - such as GET, POST, etc.

You can do it like this:

```php
<?php

// App/routes.php

return [
    
    ["GET|POST", "/some/path", "SomeController@method"],
    
]
```

The **/some/path** uri will trigger the **SomeController's method** method on either a **GET** or **POST** request.

#### Route parameters
-- to be added.

#### Named routes
Naming routes is a convenient way to later generate links to a certain route. It works like this:

```php
<?php

// App/routes.php

return [
    
    ["GET", "/", "HomeController@index", "home"],
    
]
```

The code above will register a route, named **home**.

If, somewhere in the app's lifecycle, you decide to generate a link to that route, you can use the **-- to be implemented. -- to be added.**

## Input

Zanshin comes with a tiny *Input* class, which abstracts away both *$_GET* and *$_POST* superglobals.

```php 
<?php

// If you've registered ExampleController as a service in the providers file.

use Zanshin\Contracts\InputContract;

class ExampleController
{
    private $input;

    public function __construct(InputContract $input)
    {
        $this->input = $input;
    }

    public function RandomAction()
    {
        $this->input->get("value"); // get a value from $_GET

        $this->input->post("value"); // get a value from $_POST
    }
}
```

```php
<?php

// If you haven't registered your controller as a service.

use Zanshin\Components\Input\InputComponent;

class ExampleController
{
    private $input;

    public function __construct()
    {
        $this->input = new InputComponent();
    }

    public function RandomAction() 
    {
        echo $this->input->get("value"); // echo a value from the $_GET

        echo $this->input->post("value") // echo a value from the $_POST
    }
}
```
