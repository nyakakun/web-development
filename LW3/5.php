<?php
	header("Content-Type: text/plain");
	if (isset($_GET["email"]))
	{
		$email = isset($_GET["email"]);
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$user = getUser($email);
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
			echo "Email инвалид :D";
		}
	}
	else
	{
		echo "Нет мыла :<";
	}

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