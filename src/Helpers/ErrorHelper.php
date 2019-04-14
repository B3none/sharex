<?php

namespace B3none\ShareX\Helpers;


class ErrorHelper
{
    /**
     * Handle an unauthorised error.
     */
    public function unauthorised(): void
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 401 Unauthorised', true, 401);

        echo json_encode([
            'error' => 'Invalid secret'
        ]);
    }
}