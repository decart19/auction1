
    <div class="menu">



        <a class="a_menu"  href="../index.php" >Главная</a>

        <a class="a_menu" href="#" >Справка</a>



        <a class="a_menu" href="../office.php" >Мой кабинет</a>


        <?php

            if($_COOKIE["Login"] == true)
            {
            echo ' 
                      
                       <a class="a_menu" href="../exit.php" >Выход</a>
                        <a class="a_menu" href="../office.php" >' .$_COOKIE["Login"].'</a>
                  ';

            }else
            {
                echo '<a class="a_menu" href="../authorization.php" >Авторизация</a>';
            }
        ?>

    </div>
