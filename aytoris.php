<?php

    require_once "blok/bd.php";

    $login = filtEr_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $password = filtEr_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
    $statys = $db->query("SELECT `Login`, `Password`,`type` FROM `users`");

    while ($rows = mysqli_fetch_assoc($statys))
    {

        $i = $rows['Login'];
        $j = $rows['Password'];


        if ($i == $login && $j == $password)
        {
            $type = $rows['type'];
            setcookie("Login", $i);
        }

    }

    $statys = $db->query("SELECT `id`, `type` FROM `type_users`");

    while ($rows = mysqli_fetch_assoc($statys))
    {
        $i = $rows['id'];

        if ($type == $i)
        {
            $type = $rows['type'];
        }
    }

    setcookie("Type", $type);

    //echo $_COOKIE["Type"];
   // echo $_COOKIE["Login"];
    if($_COOKIE["Type"] == "Пользователь")
    {
        require_once "index.php";
    }