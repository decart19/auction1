<?php

    require_once "blok/bd.php";
    require_once "blok/header.php";
    require_once "blok/menu.php";

?>






    <div class="content1" >



        <form action="aytoris.php" method="post">



            <label id="lb">Логин:</label><br>
            <input name="login" type="text" size="15" maxlength="15" class="pole"  value="<?=$_COOKIE['login']?>">

            <br>

            <label id="lb" >Пароль:</label><br>
            <input name="password" type="password" size="15" maxlength="15" class="pole" value="<?=$_COOKIE['password']?>">
            <br>


            <input type="submit" id="submit6" name="submit"   value="Войти" OnClick="Get();">

            <br><br>

            <div class="text-center" >
                <b>
                    <a href="../registrat.php" class="pb-1" >Зарегистрироваться</a><br>
                  <?php
                  /*  <a href="send_pass.php" class="pb-1" >Забыли пароль?</a> */
               ?>
                </b>
            </div>

        </form>

    </div>

<?php


        require_once "blok/footer.php";
    ?>



