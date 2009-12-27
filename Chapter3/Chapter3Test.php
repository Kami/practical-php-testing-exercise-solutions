<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'SomeClass.php';

/**
 *  Chapter 3 TDD exercises
 *  
 *  3.1 Write tests for a class which takes a single argument in the 
 *  constructor and gives it back when a getter is called (assertSame() or 
 *  assertEquals()?), then write the production class.
 *  
 *  3.2 Write tests for the sort() php function, for simplicity with integer 
 *  arrays as data.
 */
class Chapter3Test extends PHPUnit_Framework_TestCase
{
    public function testClassReturnsValidValue()
    {
        $class = new SomeClass('random value');
        
        $this->assertEquals('random value', $class->getValue());
    }
    
    public function testIntegersAreSortedCorrectly()
    {
        $numbers = array (8, 9, 5, 4, 7, 1, 2);
        $result = array(1, 2, 4, 5, 7, 8, 9);
        sort($numbers);
        
        $this->assertSame($result, $numbers);
    }
    
    public function testSortWasSuccessfull()
    {
        $numbers = array (8, 9, 5, 4, 7, 1, 2);
        
        $this->assertTrue(sort($numbers));
    }
    
    public function testSortPreservesInputVariableType()
    {
        $numbers = array (8, 9, 5, 4, 7, 1, 2);
        sort($numbers);
        
        $this->assertType('array', $numbers);
    }
}