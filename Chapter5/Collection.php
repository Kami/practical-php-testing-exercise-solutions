<?php

class Collection
{
    protected $_items;
    
    public function __construct()
    {
        $this->_items = array();
    }
    
    public function add($item)
    {
        array_push($this->_items, $item);
    }
    
    public function contains($value)
    {
        if (in_array($value, $this->_items))
        {
            return TRUE;
        }
        
        return FALSE;
    }
    
    public function remove()
    {
        if (array_pop($this->_items) === NULL)
        {
            throw new UnderflowException('Collection is empty');
        }
        
        return TRUE;
    }
    
    public function getCount()
    {
        return count($this->_items);
    }
    
    public function removeAt($index)
    {
        if ($this->_items[$index] === NULL)
        {
            throw new OutOfRangeException('Invalid index');
        }
        
        unset($this->_items[$index]);
        array_unshift($this->_items, array_shift($this->_items));
        
        return TRUE;
    }
}