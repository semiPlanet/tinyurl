<?php

$loader = require 'vendor/autoload.php';

require 'autoload.php';

$loader->register();

use Symfony\Component\HttpFoundation\Request;

require 'lib/framework/core.php';

$request = Request::createFromGlobals();

$app = new Framework\Core();

require 'lib/routes/routes.php';

require 'lib/framework/event/requestevent.php';

$response = $app->handle($request);

$response->send();