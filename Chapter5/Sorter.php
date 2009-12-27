<?php

class Sorter
{    
    public static function sort($toSort)
    {
        $sorted = $toSort;
        sort($sorted);
        
        return $sorted;
    }
}