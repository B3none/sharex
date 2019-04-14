<?php

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../vendor/pecee/simple-router/helpers.php";
require __DIR__ . "/../app/Router.php";

if (!file_exists(__DIR__ . "/../app/config.php")) {
    file_put_contents(
        __DIR__ . "/../app/config.php",
        file_get_contents(__DIR__ . "/../app/config.example.php")
    );
}
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
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

    echo json_encode([
        'error' => $e->getMessage()
    ]);
} catch (\B3none\ShareX\Exceptions\InvalidUrlException $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

    echo json_encode([
        'error' => $e->getMessage()
    ]);
} catch (\B3none\ShareX\Exceptions\InvalidErrorUrlException $e) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

    echo json_encode([
        'error' => $e->getMessage()
    ]);
}