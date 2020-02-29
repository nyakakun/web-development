<?php
    $text = array_key_exists($_GET, "text") ? $_GET["text"] : "";
    $spaceFlag = 'B';
    $resultString = '';

    function removeExtraBlanks($text) : string{
        foreach ($text as $value) {
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
        return = $resultString;
    }