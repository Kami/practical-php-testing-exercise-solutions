<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'FibonacciIterator.php';
require_once 'EvenIterator.php';

/**
 *  7.1 Write an infinite FibonacciIterator that returns the Fibonacci series 
 *  and test it. The Fibonacci series is 0, 1, 1, 2, 3, 5, 8... every term is the 
 *  sum of the two previous ones.
 *  
 *  7.2 Write a EvenIterator which takes a FibonacciIterator an iterates only 
 *  on the even-indexed values (returning 0, 1, 3, 8, 21...).
 *  
 *  7.3 Write tests for the EvenIterator class, stubbing out the 
 *  FibonacciIterator using an ArrayIterator in substitution, which is provided 
 *  by the Spl (otherwise it will never terminate!)
 *  
 *  7.4 Write a class that uses HTTP_Client Pear package to check a list links 
 *  and find out which are broken (404 error). Start with testing it without 
 *  instancing the real HTTP_Client class by stubbing it.
 */
class Chapter7Test extends PHPUnit_Framework_TestCase
{
    protected $_iterator;
    
    protected function setUp()
    {
        $this->_iterator = new FibonacciIterator();
        $this->_evenIterator = new EvenIterator();
    }

    public function testFirstFibonacciNumberIsZero()
    {
        foreach ($this->_iterator as $key => $value)
        {
            $this->assertEquals(0, $value);
            break;
        }
    }
    
    public function testFibonacciIteratorFirstTenNumbersOfSequence()
    {
        $fibonacciSequence = array(0, 1, 1, 2, 3, 5, 8, 13, 21, 34);
        $i = 0;
        
        foreach ($this->_iterator as $key => $value)
        {
            $this->assertEquals($fibonacciSequence[$i], $value);
            
            if (++$i == 10)
            {
                break;
            }
        }
    }
    
    public function testEvenIteratorFirstTenNumbersOfSequence()
    {
        $fibonacciSequence = array(0, 1, 3, 8, 21, 55, 144, 377, 987, 2584);
        $i = 0;
        
        foreach ($this->_evenIterator as $key => $value)
        {
            $this->assertEquals($fibonacciSequence[$i], $value);
            
            if (++$i == 10)
            {
                break;
            }
        }
    }
    
    public function testHttpClientLinkIsOk()
    {
        $response = array('code' => 200, 'headers' => '', 'body' => '');
        
        $httpClientMock = $this->getMock('HTTP_Client', array('currentResponse'));
        $httpClientMock->expects($this->any())
                       ->method('currentResponse')
                       ->will($this->returnValue($response));
                       
        $httpClientMockResponse = $httpClientMock->currentResponse();
        
        $this->assertEquals('200', $httpClientMockResponse['code']);       
    }
    
    public function testHttpClientLinkIsBroken()
    {
        $response = array('code' => 404, 'headers' => '', 'body' => '');
        
        $httpClientMock = $this->getMock('HTTP_Client', array('currentResponse'));
        $httpClientMock->expects($this->any())
                       ->method('currentResponse')
                       ->will($this->returnValue($response));
                       
        $httpClientMockResponse = $httpClientMock->currentResponse();
        
        $this->assertEquals('404', $httpClientMockResponse['code']);    
    }
}