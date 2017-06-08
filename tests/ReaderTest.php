<?php

use PHPUnit\Framework\TestCase;

use Malenki\HttpHeader\Reader;

class ReaderTest extends TestCase
{
    public function testInstanciateUsingValidUrlShouldSuccess()
    {
        $reader = new Reader('http://localhost/');
        $this->assertInstanceOf('Malenki\\HttpHeader\\Reader', $reader);
    }
}
