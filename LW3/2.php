<?php
	header("Content-Type: text/plain");
	echo isset($_GET["identifier"]) ? validateIdentificator($_GET["identifier"]) : "Нет идентификатора ☺_☺";
	
	function validateIdentificator(string $identificator): string
	{
		return preg_match("/^[A-Za-z][A-Za-z0-9]*$/", $identificator) ? "Yes" : "No";
	}