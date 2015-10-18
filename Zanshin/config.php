<?php

/**
 * Where all the configurations are prepared and registered
 * in the app's dependency injection container.
 */

$container["__zanshin.db.host"] = getenv("DB_HOST");
$contaienr["__zanshin.db.name"] = getenv("DB_NAME");
$contaienr["__zanshin.db.user"] = getenv("DB_USER");
$contaienr["__zanshin.db.pass"] = getenv("DB_PASS");