<?php

/**
 * Zanshin.
 *
 * Zanshin is a term used in the Japanese martial arts.
 * It refers to a state of awareness – of relaxed alertness.
 * A literal translation of zanshin is "remaining mind".
 */
ini_set("display_errors", 1);

/**
 * Require the composer's autoload file.
 */
require __DIR__ . "/vendor/autoload.php";

/**
 * Require the app's functions helper file.
 */
require __DIR__ . "/Zanshin/Helpers/functions.php";

/**
 * Require the bootstrap file, which runs the application.
 */
require __DIR__ . "/App/bootstrap.php";
