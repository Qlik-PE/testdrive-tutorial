<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../../vendor/autoload.php';
//require __DIR__ . '/../includes/addAuthHeader.php';

session_start();

// Adjust the time zone for PHP 5.1 and greater:
date_default_timezone_set('America/Chicago');

// bring in application settings
$settings = require __DIR__ . '/../../php/settings.php';
// Instantiate the app
$app = new \Slim\App($settings);

// Set up Slim dependency injection container
require __DIR__ . '/../../php/dependencies.php';

// Register middleware
//require __DIR__ . '/../../php/middleware.php';

/*
 * set application/json as content-type if no content type is set
 */
/*
$app->add(function($request, $response, $next) {
    if (!$request->hasHeader('Content-Type')) {
        $request = $request->withHeader('Content-Type', 'application/json');
    }
    return $next($request, $response);
});
*/

/* 
 * Add HTTP Basic Authentication to the site. Note that basic
 * authentication is the only method currently supported
 * by snowflake partner connect. For now at least we will use it
 * for everything.
 */
$container = $app->getContainer();
$app->add(new \HttpBasicAuth());

// Register routes
require __DIR__ . '/../../php/test-routes.php';  // smoke tests
require __DIR__ . '/../../php/admin-routes.php';  // admin stuff

$app->run();

?>

