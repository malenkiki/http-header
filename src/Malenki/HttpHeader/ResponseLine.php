<?php

namespace Malenki\HttpHeader;

class ResponseLine
{
    protected $httpVersion;
    protected $statusCode;
    protected $reasonPhrase;

    protected function extractInfo($line)
    {
        $words = preg_split('/\s+/', $line);
        $httpVersionProv = array_shift($words);
        $this->statusCode = (int) array_shift($words);
        $this->reasonPhrase = implode(' ', $words);
        $prov = explode('/', $httpVersionProv);
        $this->httpVersion = end($prov);
    }

    public function __construct($line)
    {
        $this->extractInfo($line);
    }

    public function getiHttpVersion()
    {
        return $this->httpVersion;
    }

    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function isInformational()
    {
        return $this->statusCode >= 100 && $this->statusCode < 200;
    }

    public function isSuccess()
    {
        return $this->statusCode >= 200 && $this->statusCode < 300;
    }

    public function isRedirection()
    {
        return $this->statusCode >= 300 && $this->statusCode < 400;
    }

    public function isClientError()
    {
        return $this->statusCode >= 400 && $this->statusCode < 500;
    }

    public function isServerError()
    {
        return $this->statusCode >= 500 && $this->statusCode < 600;
    }
}
