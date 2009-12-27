<?php

require_once 'PHPUnit\Framework\TestCase.php';
require_once 'Sorter.php';
require_once 'Collection.php';

/**
 *  5.1 Refactor the tests from 4.2 using the dataProvider annotation.
 *  
 *  5.2 Write tests for a Collection class which stores objects, and has the 
 *  methods add(), contains() and remove(). Where you should put depends 
 *  annotations?
 *  
 *  5.2 Implement the Collection class.
 */
class Chapter5Test extends PHPUnit_Framework_TestCase
{
    protected $_collection;
    
    public function setUp()
    {
        $this->_collection = new Collection();
    }
    
    public static function sortValues()
    {
        return array
                (
                    array(array(55, 66, 15, 2), array(2, 15, 55, 66)),
                    array(array(5, 4, 5, 5, 1), array(1, 4, 5, 5, 5)),
                    array(array(1, 2, 3, 7, 1), array(1, 1, 2, 3, 7)),
                    array(array(5, 8, 9, 1, 6), array(1, 5, 6, 8, 9)),
                    array(array(8, 9, 4, 3, 8), array(3, 4, 8, 8, 9))
                );
    }
    
    /**
     * @dataProvider sortValues
     */
    public function testNumbersAreSortedCorrectly($unsorted, $sorted)
    {        
        $this->assertSame($sorted, Sorter::sort($unsorted));
    }
    
    public function testCollectionIsEmptyAfterItsCreated()
    {
        $this->assertEquals(0, $this->_collection->getCount());
    }
    
    public function testCollectionAdditionWorks()
    {
        for ($i = 0; $i < 5; $i++)
        {
            $this->_collection->add('item ' . ($i + 1));
        }
        
        $this->assertEquals(5, $this->_collection->getCount());
        
        return $this->_collection;
    }
    
    /**
     * @depends testCollectionAdditionWorks
     */
    public function testCollectionContainsItem($collection)
    {
        $this->assertTrue($collection->contains('item 3'));
    }
    
     /**
     * @depends testCollectionAdditionWorks
     */
    public function testCollectionSingleItemRemovalWorks($collection)
    {
        $this->assertTrue($collection->remove());
    }
    
	/**
	 * @depends testCollectionAdditionWorks
     * @expectedException OutOfRangeException
     */
    public function testInvalidIndexThrowsExceptionOnItemRemoval($collection)
    {
        $collection->removeAt(20);
    }
    
	/**
     * @depends testCollectionAdditionWorks
     */
    public function testCollectionMultipleItemsRemovalWorks($collection)
    {
        for ($i = 0; $i < 2; $i ++)
        {
            $collection->remove();
        }
    }
    
    /**
     * @expectedException UnderflowException
     */
    public function testCollectionCantRemoveItemWhenEmpty()
    {
        $this->_collection->remove();
    }
}