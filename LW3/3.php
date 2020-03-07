<?php
	header("Content-Type: text/plain");
	$echoString = "Вы не ввели пароль";
	if (isset($_GET["password"]))
	{
		$pass = $_GET["password"];
		if (!($pass === ""))
		{
			$echoString = (string)difficultPassword($pass);
		}
	}
	echo $echoString;

	function difficultPassword(string $password): int
	{
		$strLen = strlen($password);
		$difficult = $strLen * 4; //8
		$difficult += preg_match_all("/[0-9]/", $password) * 4; //0
		$difficult += ($strLen - preg_match_all("/[A-ZА-Я]/", $password)) * 2; //4
		$difficult += ($strLen - preg_match_all("/[a-zа-я]/", $password)) * 2; //0
		$difficult -= (int)(preg_match_all("/[a-zа-яA-ZА-Я]/", $password) == 0) * $strLen; //0
		$difficult -= (int)(preg_match_all("/[0-9]/", $password) == 0) * $strLen; //2
		foreach (count_chars($password, 1) as $key => $value)
		{
			if ($value > 1)
			{
				$difficult -= $value;
			}
		}
		return $difficult;
	}