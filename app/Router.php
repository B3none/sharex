<?php

use B3none\ShareX\Controllers\UploadController;
use Pecee\Http\Middleware\Exceptions\TokenMismatchException;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\HttpException;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

class Router
{
    /**
     * Initialise the routes.
     */
    public function initialiseRoutes()
    {
        // Load all of the necessary routes
        $this->registerRoutes();

        // Set the default namespace for controllers.
        SimpleRouter::setDefaultNamespace('\B3none\ShareX\Controllers');

        // Start the routing
        try {
            SimpleRouter::start();
        } catch (TokenMismatchException $e) {
            die($e->getMessage());
        } catch (NotFoundHttpException $e) {
            die($e->getMessage());
        } catch (HttpException $e) {
            die($e->getMessage());
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Register the routes.
     */
    protected function registerRoutes()
    {
        SimpleRouter::controller('/upload', UploadController::class);

        // Handle 404 errors by falling back to the main site.
        SimpleRouter::error(function(Request $request, \Exception $exception) {
            response()->redirect(Config::$error_url);
        });
    }
}