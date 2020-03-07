<?php
	header("Content-Type: text/plain");
	echo isset($_GET["text"]) ? ($_GET["text"] === "" ? "Вы ввели пустое сообщение" : removeExtraBlanks($_GET["text"])) : "Некорректный текст О_О";

	function removeExtraBlanks(string $text): string
	{
		return preg_replace('/\s\s+/', ' ', trim($text));
	}