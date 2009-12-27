<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'Sorter.php';

/**
 *  Chapter 4 TDD exercises
 *  
 *  4.1 Write a class Sorter that wraps the sort() native function and returns 
 *  an ordered integer array without touching the original. Start with some 
 *  tests before writing a single line of production code.
 *  
 *  4.2 How many new do you have in the test case? Refactor till you have 
 *  only one object creation.
 */
class Chapter4Test extends PHPUnit_Framework_TestCase
{
    protected $_sorter;
    protected $_numbers;
    protected $_expectedResult;
    
    public function setUp()
    {
        $this->_numbers = array(8, 9, 5, 4, 7, 1, 2);
        $this->_expectedResult = array(1, 2, 4, 5, 7, 8, 9);
 
        $this->_sorter = new Sorter($this->_numbers);
    }
    
    public function testNumbersAreSortedCorrectly()
    {        
        $this->assertSame($this->_expectedResult, $this->_sorter->sort());
    }
    
    public function testOriginalArrayIsLeftUntouched()
    {
        $originalArray = $this->_numbers;
        $sorted = $this->_sorter->sort();
        
        $this->assertSame($originalArray, $this->_numbers);
    }
    
    public function testSorterLeavesTheOriginalArrayUntouched()
    {
        $original = $this->_sorter->getToSort();
        $this->_sorter->sort();
        $afterSort = $this->_sorter->getToSort();
        
        $this->assertSame($original, $afterSort);
    }
}
