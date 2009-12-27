<?php

class Calculator
{
    public static function sqrt($number = NULL)
    {
        if ($number === NULL)
        {
            throw new InvalidArgumentException('Missing argument');
        }
        
        if (!is_numeric($number))
        {
            throw new InvalidArgumentException('Argument is not a number');
        }
        
        $i = 0;
        while (TRUE)
        {
            $result = pow(++$i, 2);
            
            if ($result == $number)
            {
                break;
            }
            else if ($result > $number)
            {
                $i = (abs($number - pow($i - 1, 2)) < abs($number - $result)) ? $i - 1: $i;
                break;
            }
        }
        
        return $i;
    }
}