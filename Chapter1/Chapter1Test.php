<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once('Factorial.php');

/**
 *  Chapter 1 TDD exercises
 *  
 *  1.1 Suppose you have to code a class that calculates the factorial of an
 *  integer N, which is the product of all integers from 1 to N. Write a failing 
 *  test for it (do not code the class for now! Only the test. Suppose that the 
 *  class and its methods already exists just like you want them to be.)
 *  
 *  1.2  Add more test methods, which try different input numbers: 1, 4, 20
 *  Verify that different factorials are calculated correctly (again, just the test
 *  and no production code in this phase).
 *  
 *  1.3 Write the production code needed to make all tests pass.
 */
class Chapter1Test extends PHPUnit_Framework_TestCase
{
    
    public function testFactorialConstructorNoNumberGivenRaiseException()
    {
        try
        {
            $factorial = new Factorial();
            $this->fail();
        }
        catch (InvalidArgumentException $e)
        {
            
        }
    }
    
    public function testFactorialOfNumberOne()
    {
        $factorial = new Factorial(1);
        
        $this->assertEquals(1, $factorial->getResult());
    }
    
    public function testFactorialOfNumberFour()
    {
        $factorial = new Factorial(4);
        
        $this->assertEquals(24, $factorial->getResult());
    }
    
    public function testFactorialOfNumberTwenty()
    {
        $factorial = new Factorial(20);
        
        $this->assertEquals(2432902008176640000, $factorial->getResult());
    }
}