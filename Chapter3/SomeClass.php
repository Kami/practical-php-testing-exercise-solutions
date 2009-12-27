<?php

class SomeClass
{
    protected $_someVariable;
    
    public function __construct($someVariable)
    {
        $this->_someVariable = $someVariable;
    }
    
    public function getValue()
    {
        return $this->_someVariable;
    }
}