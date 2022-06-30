<?php

    require_once "blok/bd.php";




    $login = filtEr_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $password = filtEr_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
    $photo = filtEr_var(trim($_POST['photo']),FILTER_SANITIZE_STRING);
    $mail = filtEr_var(trim($_POST['mail']),FILTER_SANITIZE_STRING);
    $Confirmed = 2;
    $type_user = 2;





    $statys = $db->query("SELECT `Login`, `Password`,`type` FROM `users`");

$type = -40;
    while ($rows = mysqli_fetch_assoc($statys))
    {

        $i = $rows['Login'];
        $j = $rows['Password'];


        if ($i == $login && $j == $password)
        {
            setcookie("Login", $login);


            $type = $rows['type'];



        }

    }








    if($type<0)
    {
        header('Location://auction.std-1926.ist.mospolytech.ru/authorization.php');
        exit;
    }


echo $_COOKIE["Login"]."q";

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



    if($_COOKIE["Type"] == "Пользователь")
    {

        header('Location://auction.std-1926.ist.mospolytech.ru/index.php');
        exit;
    }