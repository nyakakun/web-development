<?php
	header("Content-Type: text/plain");
	
	$email = $_GET["email"] ?? null;
	if (isEmail($email))
	{
		$user = getUser($email);
		if (isset($user["ERROR"]))
		{
			echo $user["ERROR"];
		}
		else
		{
			echo (
				"First Name: " . $user["first_name"] .
				"\nLast Name: " . $user["last_name"] .
				"\nEmail: " . $user["email"] .
				"\nAge: " . $user["age"]
			);
		}
	}

	function isEmail(string $email): bool
	{
		if (isset($_GET["email"]))
		{
			if (filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				return true;
			}
			else
			{
				echo "Email инвалид :D";
				return false;
			}
		}
		else
		{
			echo "Нет мыла :<";
			return false;
		}
	}

	function getUser(string $email): array
	{
		if (file_exists("../data/$email.txt")){
			$data = file_get_contents("../data/$email.txt");
			return unserialize($data);
		}
		else
		{
			return array("ERROR" => "Пользователь с email: $email не существует");
		}
	}