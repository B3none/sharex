<?php

namespace B3none\ShareX\Controllers;

use B3none\ShareX\Helpers\FileNameHelper;

class UploadController
{
    /**
     * @var FileNameHelper
     */
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

        if ($requestData['secret'] === \Config::$secret) {
            $fileName = $this->fileNameHelper->generateFileName();

            $url = \Config::$url;
            if ($url[strlen($url) - 1] !== '/') {
                $url .= '/';
            }

            echo json_encode([
                'URL' => $url . $fileName
            ]);

            return;
        }

        header('Location: ' . \Config::$error_url);
    }
}