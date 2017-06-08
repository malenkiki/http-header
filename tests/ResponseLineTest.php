<?php

use PHPUnit\Framework\TestCase;

use Malenki\HttpHeader\ResponseLine;

class ResponseLineTest extends TestCase
{
    public function setUp()
    {
    
        $this->h10 = "HTTP/1.0 200 OK";
        $this->h11 = "HTTP/1.1 200 OK";
        $this->h20 = "HTTP/2.0 200 OK";
        
        $this->r100 = "HTTP/1.1 100 Continue";
        $this->r101 = "HTTP/1.1 101 Switching Protocols";
        
        $this->r200 = "HTTP/1.1 200 OK";
        $this->r201 = "HTTP/1.1 201 Created";
        $this->r202 = "HTTP/1.1 202 Accepted";
        $this->r203 = "HTTP/1.1 203 Non-Authoritative Information";
        $this->r204 = "HTTP/1.1 204 No Content";
        $this->r205 = "HTTP/1.1 205 Reset Content";
        $this->r206 = "HTTP/1.1 206 Partial Content";

        $this->r300 = "HTTP/1.1 300 Multiple Choices";
        $this->r301 = "HTTP/1.1 301 Moved Permanently";
        $this->r302 = "HTTP/1.1 302 Found";
        $this->r303 = "HTTP/1.1 303 See Other";
        $this->r304 = "HTTP/1.1 304 Not Modified";
        $this->r305 = "HTTP/1.1 305 Use Proxy";
        $this->r307 = "HTTP/1.1 307 Temporary Redirect";

        $this->r400 = "HTTP/1.1 400 Bad Request";
        $this->r401 = "HTTP/1.1 401 Unauthorized";
        $this->r402 = "HTTP/1.1 402 Payment Required";
        $this->r403 = "HTTP/1.1 403 Forbidden";
        $this->r404 = "HTTP/1.1 404 Not Found";
        $this->r405 = "HTTP/1.1 405 Method Not Allowed";
        $this->r406 = "HTTP/1.1 406 Not Acceptable";
        $this->r407 = "HTTP/1.1 407 Proxy Authentication Required";
        $this->r408 = "HTTP/1.1 408 Request Time-out";
        $this->r409 = "HTTP/1.1 409 Conflict";
        $this->r410 = "HTTP/1.1 410 Gone";
        $this->r411 = "HTTP/1.1 411 Length Required";
        $this->r412 = "HTTP/1.1 412 Precondition Failed";
        $this->r413 = "HTTP/1.1 413 Request Entity Too Large";
        $this->r414 = "HTTP/1.1 414 Request-URI Too Large";
        $this->r415 = "HTTP/1.1 415 Unsupported Media Type";
        $this->r416 = "HTTP/1.1 416 Requested range not satisfiable";
        $this->r417 = "HTTP/1.1 417 Expectation Failed";

        $this->r500 = "HTTP/1.1 500 Internal Server Error";
        $this->r501 = "HTTP/1.1 501 Not Implemented";
        $this->r502 = "HTTP/1.1 502 Bad Gateway";
        $this->r503 = "HTTP/1.1 503 Service Unavailable";
        $this->r504 = "HTTP/1.1 504 Gateway Time-out";
        $this->r505 = "HTTP/1.1 505 HTTP Version not supported";
    }
    
    public function testInstanciateUsingValid1XXStringShouldSuccess()
    {
        $rl100 = new ResponseLine($this->r100);
        $rl101 = new ResponseLine($this->r101);
        
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl100);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl101);
    }
    
    public function testInstanciatedWith1XXUsingIsInformationalShouldReturnTrue()
    {
        $rl100 = new ResponseLine($this->r100);
        $rl101 = new ResponseLine($this->r101);
        
        $this->assertTrue($rl100->isInformational());
        $this->assertTrue($rl101->isInformational());
    }
    
    public function testInstanciatedWith1XXShouldReturnFalseToOtherTestThanIsInformational()
    {
        $rl100 = new ResponseLine($this->r100);
        $rl101 = new ResponseLine($this->r101);
        
        $this->assertFalse($rl100->isSuccess());
        $this->assertFalse($rl100->isRedirection());
        $this->assertFalse($rl100->isClientError());
        $this->assertFalse($rl100->isServerError());
        
        $this->assertFalse($rl101->isSuccess());
        $this->assertFalse($rl101->isRedirection());
        $this->assertFalse($rl101->isClientError());
        $this->assertFalse($rl101->isServerError());
    }
    
    public function testInstanciatedWith1XXShouldReturnGoodIntegerStatusUsingGetStatusCode()
    {
        $rl100 = new ResponseLine($this->r100);
        $rl101 = new ResponseLine($this->r101);
        
        $this->assertInternalType('integer', $rl100->getStatusCode());
        $this->assertInternalType('integer', $rl101->getStatusCode());
        $this->assertEquals(100, $rl100->getStatusCode());
        $this->assertEquals(101, $rl101->getStatusCode());
    }
    
    public function testInstanciateUsingValid2XXStringShouldSuccess()
    {
        $rl200 = new ResponseLine($this->r200);
        $rl201 = new ResponseLine($this->r201);
        $rl202 = new ResponseLine($this->r202);
        $rl203 = new ResponseLine($this->r203);
        $rl204 = new ResponseLine($this->r204);
        $rl205 = new ResponseLine($this->r205);       
        $rl206 = new ResponseLine($this->r206);
        
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl200);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl201);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl202);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl203);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl204);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl205);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl206);
    }
    
        
    public function testInstanciatedWith2XXUsingIsSuccessShouldReturnTrue()
    {
        $rl200 = new ResponseLine($this->r200);
        $rl201 = new ResponseLine($this->r201);
        $rl202 = new ResponseLine($this->r202);
        $rl203 = new ResponseLine($this->r203);
        $rl204 = new ResponseLine($this->r204);
        $rl205 = new ResponseLine($this->r205);       
        $rl206 = new ResponseLine($this->r206);
        
        $this->assertTrue($rl200->isSuccess());
        $this->assertTrue($rl201->isSuccess());
        $this->assertTrue($rl202->isSuccess());
        $this->assertTrue($rl203->isSuccess());
        $this->assertTrue($rl204->isSuccess());
        $this->assertTrue($rl205->isSuccess());
        $this->assertTrue($rl206->isSuccess());
    }
    
    
    public function testInstanciatedWith2XXShouldReturnFalseToOtherTestThanIsSuccess()
    {
        $rl200 = new ResponseLine($this->r200);
        $rl201 = new ResponseLine($this->r201);
        $rl202 = new ResponseLine($this->r202);
        $rl203 = new ResponseLine($this->r203);
        $rl204 = new ResponseLine($this->r204);
        $rl205 = new ResponseLine($this->r205);       
        $rl206 = new ResponseLine($this->r206);
        
        $this->assertFalse($rl200->isInformational());
        $this->assertFalse($rl200->isRedirection());
        $this->assertFalse($rl200->isClientError());
        $this->assertFalse($rl200->isServerError());
        
        $this->assertFalse($rl201->isInformational());
        $this->assertFalse($rl201->isRedirection());
        $this->assertFalse($rl201->isClientError());
        $this->assertFalse($rl201->isServerError());
        
        $this->assertFalse($rl202->isInformational());
        $this->assertFalse($rl202->isRedirection());
        $this->assertFalse($rl202->isClientError());
        $this->assertFalse($rl202->isServerError());
        
        
        $this->assertFalse($rl203->isInformational());
        $this->assertFalse($rl203->isRedirection());
        $this->assertFalse($rl203->isClientError());
        $this->assertFalse($rl203->isServerError());
        
        
        $this->assertFalse($rl204->isInformational());
        $this->assertFalse($rl204->isRedirection());
        $this->assertFalse($rl204->isClientError());
        $this->assertFalse($rl204->isServerError());
        
        
        $this->assertFalse($rl205->isInformational());
        $this->assertFalse($rl205->isRedirection());
        $this->assertFalse($rl205->isClientError());
        $this->assertFalse($rl205->isServerError());
        
        
        $this->assertFalse($rl206->isInformational());
        $this->assertFalse($rl206->isRedirection());
        $this->assertFalse($rl206->isClientError());
        $this->assertFalse($rl206->isServerError());
    }
      
    public function testInstanciatedWith2XXShouldReturnGoodIntegerStatusUsingGetStatusCode()
    {
        $this->markTestIncomplete();
    }
    
    public function testInstanciateUsingValid3XXStringShouldSuccess()
    {
        $rl300 = new ResponseLine($this->r300);
        $rl301 = new ResponseLine($this->r301);
        $rl302 = new ResponseLine($this->r302);
        $rl303 = new ResponseLine($this->r303);
        $rl304 = new ResponseLine($this->r304);
        $rl305 = new ResponseLine($this->r305);       
        $rl307 = new ResponseLine($this->r307);
       
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl300);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl301);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl302);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl303);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl304);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl305);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl307);      
    }
    
          
    public function testInstanciatedWith3XXUsingIsRedirectionShouldReturnTrue()
    {
        $this->markTestIncomplete();
    }
    
    public function testInstanciatedWith3XXShouldReturnFalseToOtherTestThanIsRedirection()
    {
        $this->markTestIncomplete();
    }
    
          
    public function testInstanciatedWith3XXShouldReturnGoodIntegerStatusUsingGetStatusCode()
    {
        $this->markTestIncomplete();
    }
      
    public function testInstanciateUsingValid4XXStringShouldSuccess()
    {
        $rl400 = new ResponseLine($this->r400);
        $rl401 = new ResponseLine($this->r401);
        $rl402 = new ResponseLine($this->r402);
        $rl403 = new ResponseLine($this->r403);
        $rl404 = new ResponseLine($this->r404);
        $rl405 = new ResponseLine($this->r405);       
        $rl406 = new ResponseLine($this->r406);
        $rl407 = new ResponseLine($this->r407);
        $rl408 = new ResponseLine($this->r408);
        $rl409 = new ResponseLine($this->r409);
        $rl410 = new ResponseLine($this->r410);
        $rl411 = new ResponseLine($this->r411);
        $rl412 = new ResponseLine($this->r412);
        $rl413 = new ResponseLine($this->r413);       
        $rl414 = new ResponseLine($this->r414);
        $rl415 = new ResponseLine($this->r415);
        $rl416 = new ResponseLine($this->r416);
        $rl417 = new ResponseLine($this->r417);
      
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl400);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl401);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl402);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl403);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl404);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl405);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl406);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl407);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl408);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl409);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl410);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl411);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl412);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl413);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl414);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl415);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl416);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl417);
   
    }
    
           
    public function testInstanciatedWith4XXUsingIsClientErrorShouldReturnTrue()
    {
        $this->markTestIncomplete();
    }
    
    public function testInstanciatedWith4XXShouldReturnFalseToOtherTestThanIsClientError()
    {
        $this->markTestIncomplete();
    }
    
          
    public function testInstanciatedWith4XXShouldReturnGoodIntegerStatusUsingGetStatusCode()
    {
        $this->markTestIncomplete();
    }
    
      
    public function testInstanciateUsingValid5XXStringShouldSuccess()
    {
        $rl500 = new ResponseLine($this->r500);
        $rl501 = new ResponseLine($this->r501);
        $rl502 = new ResponseLine($this->r502);
        $rl503 = new ResponseLine($this->r503);
        $rl504 = new ResponseLine($this->r504);
        $rl505 = new ResponseLine($this->r505);  
             
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl500);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl501);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl502);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl503);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl504);
        $this->assertInstanceOf('Malenki\\HttpHeader\\ResponseLine', $rl505);
    }
    
          
    public function testInstanciatedWith5XXUsingIsServerErrorShouldReturnTrue()
    {
        $this->markTestIncomplete();
    }
    
    public function testInstanciatedWith5XXShouldReturnFalseToOtherTestThanIsServerError()
    {
        $this->markTestIncomplete();
    }
 
       
    public function testInstanciatedWith5XXShouldReturnGoodIntegerStatusUsingGetStatusCode()
    {
        $this->markTestIncomplete();
    }
       
    public function testInstanciationShouldReturnRightVersionCode()
    {
        $rlh10 = new ResponseLine($this->h10);
        $rlh11 = new ResponseLine($this->h11);
        $rlh20 = new ResponseLine($this->h20);
        
        $this->assertInternalType('string', $rlh10->getHttpVersion());
        $this->assertInternalType('string', $rlh11->getHttpVersion());
        $this->assertInternalType('string', $rlh20->getHttpVersion());
        
        $this->assertEquals('1.0', $rlh10->getHttpVersion());
        $this->assertEquals('1.1', $rlh11->getHttpVersion());
        $this->assertEquals('2.0', $rlh20->getHttpVersion());
    }
}
