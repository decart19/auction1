<?php

    require_once "blok/bd.php";




    $login = filtEr_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $password = filtEr_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
    $photo = filtEr_var(trim($_POST['photo']),FILTER_SANITIZE_STRING);
    $mail = filtEr_var(trim($_POST['mail']),FILTER_SANITIZE_STRING);
    $Confirmed = 2;
    $type_user = 2;

        $l = strlen($login);

       if($l <30 && $l>4)
       {
           $l = strlen($password);

           if($l <30 && $l>5)
           {
               $l = strlen($photo);

               if( $l == 11 )
               {
                   $l = strlen($mail);

                   if($l > 4)
                   {
                       $db->query("INSERT INTO `users` (`id`, `Login`, `Password`,`Mail`,`Phone`,`Confirmed`,`type`) VALUES (NULL,'$login','$password','$mail','$photo','$Confirmed','$type_user');");//работает
                       setcookie("Login", $login);
                   }else
                   {
                       $errov ="Некоректно введена элекьронная почта";
                       setcookie("Errov",  $errov);
                       header('Location://auction.std-1926.ist.mospolytech.ru/registrat.php');
                       exit;
                   }

               }else
               {
                   $errov ="Телефое должен быть записан в таком формате 79457456743 ";
                   setcookie("Errov",  $errov);
                   header('Location://auction.std-1926.ist.mospolytech.ru/registrat.php');
                   exit;
               }

           }else
           {
               $errov ="Пароль не должен быть длиннее 20 символов или короче 6 символов ";
               setcookie("Errov",  $errov);
               header('Location://auction.std-1926.ist.mospolytech.ru/registrat.php');
               exit;
           }

       }else
       {
           $errov ="Логин не должен быть длиннее 20 символов или короче 6 символов ";
           setcookie("Errov",  $errov);
           header('Location://auction.std-1926.ist.mospolytech.ru/registrat.php');
           exit;
       }

    $statys = $db->query("SELECT `Login`, `Password`,`type` FROM `users`");


    while ($rows = mysqli_fetch_assoc($statys))
    {

        $i = $rows['Login'];
        $j = $rows['Password'];


        if ($i == $login && $j == $password)
        {



            $type = $rows['type'];



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



    if($_COOKIE["Type"] == "Пользователь")
    {

        header('Location://auction.std-1926.ist.mospolytech.ru/index.php');
        exit;
    }