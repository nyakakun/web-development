<?php
    function validateIdentificator(string $identificator): string
    {
        if(isset($identificator)){
            return preg_match("/^[A-Za-z][A-Za-z0-9]*$/", $identificator) ? "Yes" : "No";
        }
        else{
            return "Нет идентификатора ☺_☺";
        }
    }
    echo validateIdentificator(isset($_GET["identifier"]) ? $_GET["identifier"] : null);