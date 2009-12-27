<?php

class EvenIterator extends FibonacciIterator
{
    public function next()
    {
        $this->_sum = $this->_number1 + $this->_number2;
        $this->_number1 = $this->_number2;
        $this->_number2 = $this->_sum;
        
        ++$this->_position;
        
        if ($this->_position % 2 !== 0)
        {
            $this->next();
        }
    }
}