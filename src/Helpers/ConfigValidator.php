<?php

namespace B3none\ShareX\Helpers;

use B3none\ShareX\Exceptions\InvalidErrorUrlException;
use B3none\ShareX\Exceptions\InvalidSecretException;
use B3none\ShareX\Exceptions\InvalidUrlException;

class ConfigValidator
{
    /**
     * @throws InvalidErrorUrlException
     * @throws InvalidSecretException
     * @throws InvalidUrlException
     */
    public function validateConfig(): void
    {
        $this->validateSecret();
        $this->validateUrl();
        $this->validateErrorUrl();
    }

    /**
     * Check whether the secret is valid.
     *
     * @throws InvalidSecretException
     */
    protected function validateSecret(): void
    {
        $secret = \Config::$secret;

        if ($secret === '') {
            throw new InvalidSecretException('Please populate the secret in the config.');
        }
    }

    /**
     * Check whether the URL is valid.
     *
     * @throws InvalidUrlException
     */
    protected function validateUrl(): void
    {
        $url = \Config::$url;

        if ($url === '') {
            throw new InvalidUrlException('Please populate the URL in the config.');
        }
    }

    /**
     * Check whether the error URL is valid.
     *
     * @throws InvalidErrorUrlException
     */
    protected function validateErrorUrl(): void
    {
        $errorUrl = \Config::$error_url;

        if ($errorUrl === '') {
            throw new InvalidErrorUrlException('Please populate the error URL in the config.');
        }
    }
}