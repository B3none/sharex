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
        $secret = input()->post('secret');
        $image = input()->file('image');

        if (!$secret) {
            $this->errorHelper->unauthorised();

            return;
        }

        if ($secret == \Config::$secret) {
            $fileName = $this->fileNameHelper->generateFileName();

            $url = \Config::$url;
            if ($url[strlen($url) - 1] !== '/') {
                $url .= '/';
            }

            if (!$image->move(__DIR__ . '/../../web/' . $fileName)) {
                $this->errorHelper->directoryPermissions();

                return;
            }

            echo $url . $fileName;

            return;
        }

        $this->errorHelper->unauthorised();
    }
}