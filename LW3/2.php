<?php
    function validateIdentificator($identificator)
    {
        if(strlen($identificator) > 0)
        {
            if((($identificator[0] <= 'z') && ($identificator[0] >= 'a'))
            ||(($identificator[0] <= 'Z') && ($identificator[0] >= 'A')))
            {
                for($index = 1; $index < strlen($identificator); $index++)
                {
                    $currentChar = $identificator[$index];
                    if (!((($currentChar <= 'z') && ($currentChar >= 'a'))
                        ||(($currentChar <= 'Z') && ($currentChar >= 'A'))
                        ||(($currentChar <= '9') && ($currentChar >= '0'))))
                    {
                        return "Неопознаный символ \"" . $currentChar ."\"";
                    }
                }
            }
            else
            {
                return "Идентификатор можен начинаться только с буквы, а обнаружен: \"" . $identificator[0] ."\"";
            }
            return "Идентификатор соответствует правилу";
        }
        else
        {
            return "идентификатор не может быть пустым";
        }
    }