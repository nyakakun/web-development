<?php

    function removeExtraBlanks($text)
    {
        $spaceFlag = 'B';
        $resultString = '';

        for ($index = 0; $index < strlen($text); $index++) {
            $value = $text[$index];
            if(($value === ' ') && ($spaceFlag === 'N')){
                $spaceFlag = 'S';
            }elseif (!($value === ' ')) {
                if($spaceFlag === 'S'){
                    $resultString += ' ';
                }
                $spaceFlag = 'N';
                $resultString += $value;
            }
        }
        return $resultString;
    }