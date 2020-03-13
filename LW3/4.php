<?php
	header("Content-Type: text/plain");
	if (isset($_GET["email"]))
	{
		$email = $_GET["email"];
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$user = userInit();
			registrationUser($user);
			echo "Данные сохранены!";
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

	function userInit(): array
	{
		return [
			"first_name" => isset($_GET["first_name"]) ? $_GET["first_name"] : " ",
			"last_name" => isset($_GET["last_name"]) ? $_GET["last_name"] : " ",
			"email" => $_GET["email"],
			"age" => isset($_GET["age"]) ? $_GET["age"] : " "
		];
	}
	function registrationUser(array $user)
	{
		$data = serialize($user);
		$email = $user["email"];
		if (!is_dir("../data"))
		{
			mkdir("../data");
		}
		file_put_contents("../data/$email.txt", $data);
	}