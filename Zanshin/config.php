<?php

/**
 * Where all the configurations are prepared and registered
 * in the app's dependency injection container.
 */

$container["__zanshin.db.host"] = getenv("DB_HOST");
$container["__zanshin.db.name"] = getenv("DB_NAME");
$container["__zanshin.db.user"] = getenv("DB_USER");
$container["__zanshin.db.pass"] = getenv("DB_PASS");

