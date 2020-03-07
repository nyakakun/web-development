<?php
	header("Content-Type: text/plain");
	function difficultPassword(string $password): int
	{
		$strLen = strlen($password);
		$difficult = $strLen * 4;
		$difficult += preg_match_all("/[0-9]/", $password) * 4;
		$difficult += ($strLen - preg_match_all("/[A-ZА-Я]/", $password)) * 2;
		$difficult += ($strLen - preg_match_all("/[a-zа-я]/", $password)) * 2;
		$difficult -= (int)(preg_match_all("/[a-zа-яA-ZА-Я]/", $password) == 0) * $strLen;
		$difficult -= (int)(preg_match_all("/[0-9]/", $password) == 0) * $strLen;
		foreach (count_chars($password, 1) as $key => $value)
		{
			if ($value > 1)
			{
				$difficult -= $value;
			}
		}
		return $difficult;
	}
	echo isset($_GET["password"]) ? (string)difficultPassword($_GET["password"]) : "Вы не ввели пароль!!!";