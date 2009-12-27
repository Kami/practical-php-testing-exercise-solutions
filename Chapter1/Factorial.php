<?php

class Factorial
{
    protected $_number;
    
    public function __construct($number)
    {
        if (!is_int($number))
        {
            throw new InvalidArgumentException('Missing argument or not a number');
        }
        
        $this->_number = $number;
    }
    
    public function getResult()
    {
        $factorial = 1;
        
        for ($i = 1; $i <= $this->_number; $i++)
        {
            $factorial *= $i;
        }
        
        return $factorial;
    }
}