<?php

require_once "blok/bd.php";
require_once "blok/header.php";
?>
 <link rel="stylesheet"  href="../CSS/Style.css"> <?php
require_once "blok/menu.php";


                $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                $statys = $db->query("SELECT `id`, `name`,`price`,`blitz_price` FROM `lot`");

           echo '<form action="'.$url.'" method="post">'.'<div id="lot2" >';


            while ($rows = mysqli_fetch_assoc($statys))
            {
               $u = $rows['id'];
                $url2='http://auction.std-1926.ist.mospolytech.ru/Lot.php/'.$rows['id'];

                if($url2 == $url)
                {
                    echo '<h1>'.$rows['name'].'</h1>';
                    $i = $rows['id'];
                    $price = $rows['price'];
                    $data = time() + $rows['start_date'];


                    $statys2 = $db->query("SELECT `id`,`photo`,`lot` FROM `photo`");

                    while ($rows2 = mysqli_fetch_assoc($statys2))
                    {




                        if($i == $rows2['lot'] )
                        {
                            echo '<div id="photo"><img class="img-container" src="../'.$rows2['photo'].'"></div>';

                        }

                    }




                }


            }

            echo '<div><h2>Начальная цена: '.$price.'</h2></div>';
            echo '<div><h2>Дата начала: '.$data.'</h2></div>';
             echo '<input type="submit" name="submit" class="btn btn-success" style="width: 300px;background-color: #3f51b5;" value="Сделать ставку" OnClick="Get();">';

            if( $_POST['submit'] == true ) {

                echo "fffff";


            }


            ?>


    </div>
    </form>
