<?php
	header("Content-Type: text/plain");
	function getUser(string $email): array
	{
		if (file_exists("../data/$email")){
			$data = file_get_contents("../data/$email");
			return unserialize($data);
		}
		else
		{
			return array("ERROR" => "Пользователь с email: $email не существует");
		}
	}
	if (isset($_GET["email"]))
	{
		$user = getUser($_GET["email"]);
		if (isset($user["ERROR"]))
		{
			echo $user["ERROR"];
		}
		else
		{
			echo "First Name: " . $user["first_name"] . "\nLast Name: " . $user["last_name"] .  "\nEmail: " . $user["email"] .  "\nAge: " . $user["age"];
		}
	}
	else
	{
		echo "Нет мыла :<";
	}
