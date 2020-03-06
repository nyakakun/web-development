<?php
    function removeExtraBlanks(string $text): string
    {
        return is_null($text) ? "Некорректный текст О_О" : preg_replace('/\s\s+/', ' ', trim($text));
    }
    echo removeExtraBlanks(isset($_GET["text"]) ? $_GET["text"] : null);