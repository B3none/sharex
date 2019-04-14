<?php

namespace B3none\ShareX\Controllers;

use B3none\ShareX\Helpers\FileNameHelper;

class UploadController
{
    protected $fileNameHelper;

    public function __construct()
    {
        $this->fileNameHelper = new FileNameHelper();
    }

    /**
     * Process an incoming screenshot
     */
    public function postIndex(): void
    {
        $requestData = input()->all();

        if ($requestData['key'] === \Config::$secret) {
            $fileName = $this->fileNameHelper->generateFileName();

            return;
        }
    }
}