<?php

namespace B3none\ShareX\Controllers;

use B3none\ShareX\Helpers\ErrorHelper;
use B3none\ShareX\Helpers\FileNameHelper;

class UploadController
{
    /**
     * @var FileNameHelper
     */
    protected $fileNameHelper;

    /**
     * @var ErrorHelper
     */
    protected $errorHelper;

    public function __construct()
    {
        $this->fileNameHelper = new FileNameHelper();
        $this->errorHelper = new ErrorHelper();
    }

    /**
     * Process an incoming screenshot
     */
    public function postIndex(): void
    {
        $requestData = input()->all();

        if (!in_array('secret', $requestData)) {
            $this->errorHelper->unauthorised();
        }

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

        $this->errorHelper->unauthorised();
    }
}