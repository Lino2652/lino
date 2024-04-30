<?php

require_once '../vendor/autoload.php';

use Respect\Validation\Validator as v;

v::key('DATABASE_URL', v::stringType())
  ->assert($_ENV);

define("DATABASE_URL", $_ENV["DATABASE_URL"]);

function redirect($location)
{
  header("Location: $location");
  die();
}

$__conn = pg_connect(DATABASE_URL);
assert($__conn, "Failed to connect to DB");

$db = $__conn;
