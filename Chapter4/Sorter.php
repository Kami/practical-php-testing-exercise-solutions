<?php

class Sorter
{
    protected $_toSort;
    
    public function __construct(array $toSort)
    {
        $this->_toSort = $toSort;
    }
    
    public function getToSort()
    {
        return $this->_toSort;
    }
    
    public function sort()
    {
        $sorted = $this->_toSort;
        sort($sorted);
        
        return $sorted;
    }
}