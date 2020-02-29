<?php

    function removeExtraBlanks($text)
    {
        $spaceFlag = 'B';
        $resultString = '';

        for($index = 0; $index < strlen($text); $index++) {
            $value = $text[$index];
            if(($value === ' ') && ($spaceFlag === 'С')){
                $spaceFlag = 'S';
            }elseif (!($value === ' ')) {
                if($spaceFlag === 'S'){
                    $resultString = $resultString . ' ';
                }
                $spaceFlag = 'С';
                $resultString = $resultString . $value;
            }
        }
        return $resultString;
    }