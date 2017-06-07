<?php

use PHPUnit\Framework\TestCase;

use Malenki\HttpHeader\Reader;

final class ReaderTest extends TestCase
    {
        public function testInstanciateUsingValidUrlShouldSuccess(): void
        {
            $this->assertInstanceOf('Malenki\\HttpHeader\\Reader', new Reader('http://localhost/'));
        }
    }
