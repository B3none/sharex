<?php

namespace B3none\ShareX\Helpers;

class FileNameHelper
{
    protected $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Get a "random" string.
     *
     * @param int $length
     * @return string
     */
    protected function generateRandomString($length = 10): string
    {
        $randomString = '';

        $charactersLength = strlen($this->characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $this->characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * Check whether a file already exists
     *
     * @param string $file
     * @return bool
     */
    public function doesFileExist(string $file): bool
    {
        return is_file(__DIR__ . '/../../web/static/' . $file);
    }

    /**
     * Generate a new file name
     *
     * @return string
     */
    public function generateFileName(): string
    {
        do {
            $file = $this->generateRandomString();
        } while($this->doesFileExist($file));

        return $file;
    }
}