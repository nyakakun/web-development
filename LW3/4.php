<?php
    header("Content-Type: text/plain");
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
    if (isset($_GET["email"]))
    {
        registrationUser(
            isset($_GET["first_name"]) ? $_GET["first_name"] : " ",
            isset($_GET["last_name"]) ? $_GET["last_name"] : " ",
            $_GET["email"],
            isset($_GET["age"]) ? $_GET["age"] : " "
        );
        echo "Данные сохранены!";
    }
    else
    {
        echo "Нет мыла :<";
    }
