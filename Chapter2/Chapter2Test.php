<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once('Factorial.php');

/**
 *  Chapter 2 TDD exercises
 *  
 *  18 Chapter 2: write clever tests 
 *  the factorial of 0? (it is assumed by definition equal to 1.) Add a failing test 
 *  case.
 *  
 *  2.2 Modify the production class to make all the tests pass2.1 What does happen to your class from 1.1 when you try to calculate 
 */
class Chapter2Test extends PHPUnit_Framework_TestCase
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
    
    /* Already taken care in the class implementation for Chapter 1, but in any case */
    public function testFactorialOfNumberZero()
    {
        $factorial = new Factorial(0);
        
        $this->assertEquals(1, $factorial->getResult());
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