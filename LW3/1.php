<?php
	header("Content-Type: text/plain");
	function removeExtraBlanks(string $text): string
	{
		return preg_replace('/\s\s+/', ' ', trim($text));
	}
	echo isset($_GET["text"]) ? removeExtraBlanks($_GET["text"]) : "Некорректный текст О_О";