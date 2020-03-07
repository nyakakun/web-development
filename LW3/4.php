<?php
	header("Content-Type: text/plain");
	if (isset($_GET["email"]))
	{
		$email = $_GET["email"];
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			registrationUser(
				isset($_GET["first_name"]) ? $_GET["first_name"] : " ",
				isset($_GET["last_name"]) ? $_GET["last_name"] : " ",
				$email,
				isset($_GET["age"]) ? $_GET["age"] : " "
			);
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

	function registrationUser(string $FirstName, $lastName, $email, $age)
	{
		$user = array(
			"first_name" => $FirstName,
			"last_name" => $lastName,
			"email" => $email,
			"age" => $age
		);
		$data = serialize($user);
		if (!is_dir("../data"))
		{
			mkdir("../data");
		}
		file_put_contents("../data/$email", $data);
	}