<?php

class FibonacciIterator implements Iterator
{
    protected $_number1 = 0;
    protected $_number2 = 1;
    protected $_sum = 0;
    
    protected $_position = 0;
    
    public function key()
    {
        return $this->_position;
    }
    
    public function current()
    {
        return $this->_number1;
    }
    
    public function next()
    {
        $this->_sum = $this->_number1 + $this->_number2;
        $this->_number1 = $this->_number2;
        $this->_number2 = $this->_sum;
        
        ++$this->_position;
    }
    
    public function valid()
    {
        return TRUE;
    }
    
    public function rewind()
    {
        $this->_number1 = 0;
        $this->_number2 = 1;
        $this->_sum = 0;
        
        $this->_position = 0;
    }
}