<?php

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../vendor/pecee/simple-router/helpers.php";
require __DIR__ . "/../app/Router.php";

/**
 * Register routes
 */
(new Router())->initialiseRoutes();