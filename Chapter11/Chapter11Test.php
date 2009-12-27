<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'Calculator.php';

/**
 * 11.1 TDD a Calculator class, which has only the method Calculator::sqrt(). 
 * Implement the class one test at the time. 
 * Remember that: 
 * - you should add a *failing* test and then improving production code 
 * to handle the new test case. 
 * - you can add a test only if the tests are green 
 * - you can add production code only if the tests are red, and if I 
 * removed part of your addition the test should return red (ensuring you are 
 * not writing unused code) 
 * - you cannot use the sqrt() function in this exercise 
 * - you can use a guess-and-check method: to find the square root of 
 * 36, try 1, try 2, try 3... until you get to 6. Round the result to the nearest 
 * integer.
 */
class Chapter11Test extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testCalculatorThrowsExceptionOnNoArgument()
    {
        Calculator::sqrt();
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testCalculatorThrowsExceptionOnInvalidArgumentType()
    {
        Calculator::sqrt('string');
    }
    
    public function testCalculateSquareRootOfNumber36()
    {
        $this->assertEquals(6, Calculator::sqrt(36));
    }

    public static function squareRootValues()
    {
        return array
                (
                    array(1, 1),
                    array(4, 2),
                    array(9, 3),
                    array(16, 4),
                    array(25, 5),
                    array(36, 6),
                    array(49, 7),
                    array(64, 8),
                    array(81, 9),
                    array(100, 10)
                );
    }
    
    /**
     * @dataProvider squareRootValues
     */
    public function testSquareRootIsCalculactedCorrectly($number, $squareRoot)
    {
        $this->assertEquals($squareRoot, Calculator::sqrt($number));
    }
    
    public static function squareRootRoundedValues()
    {
        return array
                   (
                       array(26, 5),
                       array(27, 5),
                       array(28, 5),
                       array(29, 5),
                       array(30, 5),
                       array(31, 6),
                       array(32, 6),
                       array(33, 6),
                       array(34, 6),
                       array(35, 6)
                   );
    }
    
    /**
     * @dataProvider squareRootRoundedValues
     */
    public function testSquareRootIsRoundedCorrectly($number, $squareRoot)
    {
        $this->assertEquals($squareRoot, Calculator::sqrt($number));
    }
}