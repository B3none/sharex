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
        $image = input()->file('image');

        if (!in_array('secret', $requestData)) {
            $this->errorHelper->unauthorised();

            return;
        }

        if ($requestData['secret'] === \Config::$secret) {
            $fileName = $this->fileNameHelper->generateFileName();

            $url = \Config::$url;
            if ($url[strlen($url) - 1] !== '/') {
                $url .= '/';
            }

            if (!move_uploaded_file($image['tmpName'], __DIR__ . '/../../web/' . $fileName)) {
                $this->errorHelper->directoryPermissions();

                return;
            }

            echo $url . $fileName;

            return;
        }

        $this->errorHelper->unauthorised();
    }
}