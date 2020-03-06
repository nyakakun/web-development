<?php
    function difficultPassword($password)
    {
        $oldChar = "";
        $difficult = 0;
        for($index = 0; $index < strlen($password); $index++)
        {
            $difficult += 4;
            $currentChar = $password[$index];
            if(($currentChar >= '0') && ($currentChar <= '9'))
            {
                $difficult += 4;
            }
            
            if((($currentChar >= 'a') && ($currentChar <= 'z'))
            || (($currentChar >= 'A') && ($currentChar <= 'Z')))
            {
                $difficult += 2;
            }
            
            if
            {
                $difficult += 2;
            }
        }
    }