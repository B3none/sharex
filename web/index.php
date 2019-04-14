<?php

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../vendor/pecee/simple-router/helpers.php";
require __DIR__ . "/../app/Router.php";
require __DIR__ . "/../app/config.php";

try {
    /**
     * Validate the config
     */
    (new \B3none\ShareX\Helpers\ConfigValidator())->validateConfig();

    /**
     * Register routes
     */
    (new Router())->initialiseRoutes();
} catch (\B3none\ShareX\Exceptions\InvalidSecretException $e) {
    echo json_encode([
        'error' => $e->getMessage()
    ]);
} catch (\B3none\ShareX\Exceptions\InvalidUrlException $e) {
    echo json_encode([
        'error' => $e->getMessage()
    ]);
} catch (\B3none\ShareX\Exceptions\InvalidErrorUrlException $e) {
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}