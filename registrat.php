<?php

    require_once "blok/bd.php";
    require_once "blok/header.php";
    require_once "blok/menu.php";

?>

    <div class="content1" >



        <form action="reg.php" method="post">

            <p class="errov"><?php echo $_COOKIE["Errov"]; ?></p>


            <label id="lb">Логин:</label><br>
            <input name="login" type="text" size="15" maxlength="15" class="pole"  value="">
            <br>

            <label id="lb" >Пароль:</label><br>
            <input name="password" type="password" size="15" maxlength="15" class="pole" value="">
            <br>

            <label id="lb" >Электронная почта:</label><br>
            <input name="mail" type="text" size="15" maxlength="50" class="pole" value="">
            <br>

            <label id="lb" >Телефон:</label><br>
            <input name="photo" type="text" size="15" maxlength="15" class="pole" value="">
            <br>


            <input type="submit" id="submit6" name="submit"   value="Зарегистрироваться" OnClick="Get();">

            <br><br>



        </form>

    </div>




<?php

        require_once "../blok/footer.php";

?>



