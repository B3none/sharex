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

    public function directoryPermissions(): void
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

        echo json_encode([
            'error' => 'Missing directory permissions. Does the directory have 777 permissions?'
        ]);
    }
}