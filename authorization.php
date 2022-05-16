<?php

    require_once "blok/bd.php";
    require_once "blok/header.php";
    require_once "blok/menu.php";

?>

<div id="particles" class="particles"></div>


<div class="container min-vh-100 " style="padding-top: 55px;">


    <div class="content justify-content-center row vh-50 bg-white mx-md-5 py-5 border border-secondary" style="border-radius: 10px">



        <form action="aytoris.php" method="post">



            <label>Логин:</label><br>
            <input name="login" type="text" size="15" maxlength="15" class="form-control" style="width: 300px;" value="<?=$_COOKIE['login']?>">

            <br>

            <label>Пароль:</label><br>
            <input name="password" type="password" size="15" maxlength="15" class="form-control" style="width: 300px;" value="<?=$_COOKIE['password']?>">
            <br>


            <input type="submit" name="submit" class="btn btn-success" style="width: 300px;background-color: #3f51b5;" value="Войти" OnClick="Get();">

            <br><br>

            <div class="text-center" style="font-size: 15px">
                <b>
                    <a href="reg.php" class="pb-1">Зарегистрироваться</a><br>
                    <a href="send_pass.php">Забыли пароль?</a>
                </b>
            </div>

        </form>

    </div></div>

<?php
    if( $_POST['submit'] == true ) {

    $login = $_POST['login'];
    $password = $_POST['password'];


    $statys = $db->query("SELECT `Login`, `Password` FROM `users`");
    while ($rows = mysqli_fetch_assoc($statys)) {


        $i = $rows['Login'];
        $j = $rows['Password'];
        $type = $rows['type'];


        if ($i == $login && $j == $password) {

           require('aytoris.php');

        }


    }
}

        require_once "blok/footer.php";
    ?>



