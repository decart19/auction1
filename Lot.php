<?php

require_once "blok/bd.php";
require_once "blok/header.php";
?>
 <link rel="stylesheet"  href="../CSS/Style.css">
<?php
require_once "blok/menu.php";


                $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];



$lg= $_COOKIE['Login'];

$statys = $db->query("SELECT `Login`, `id` FROM `users`");

while ($rows = mysqli_fetch_assoc($statys))
{

    $i = $rows['Login'];
    $j = $rows['id'];


    if ($i == $lg )
    {
        $id = $rows['id'];

    }

}




                $statys = $db->query("SELECT `id`, `end_date`,`start_date`,`status`,`name`,`price`,`blitz_price` FROM `lot`");

           echo '<form action="'.$url.'" method="post">'.'<div id="lot2" >';


            while ($rows = mysqli_fetch_assoc($statys))
            {

                $url2='http://auction.std-1926.ist.mospolytech.ru/Lot.php/'.$rows['id'];

                if($url2 == $url)
                {
                    echo '<h1 class="h1_Lot">'.$rows['name'].'</h1>';
                    $u = $rows['id'];
                    $price = $rows['price'];
                    //$date = $rows['start_date'];
                    //$date =  $rows['start_date'];
                    $start_date =  $rows['start_date'];
                    $blitz_price = $rows['blitz_price'];
                    $status = $rows['status'];
                    $end_date =  $rows['end_date'];
                    $date = date('Y-m-d H:m:s');
                    $you_date_unix = strtotime($end_date);
                    $now_date_unix = strtotime($date);
                    $result = ($you_date_unix - $now_date_unix);

                   // $data =  date_format( $data,'Y-m-d H:m:s');

                    $statys2 = $db->query("SELECT `id`,`photo`,`lot` FROM `photo`");

                    while ($rows2 = mysqli_fetch_assoc($statys2))
                    {

                        if($u == $rows2['lot'] )
                        {
                            echo '<div id="photo"><img class="img-container_lot" src="../'.$rows2['photo'].'">';


                                while ($rows7 = mysqli_fetch_assoc($statys2))
                                {

                                    if($rows2['id'] != $rows7['id'] && $u == $rows7['lot'] )
                                    {

                                           echo '<img class="img_mini" src="../'.$rows7['photo'].'">';
                                    }

                                }

                                echo '</div>';
                                break;
                        }

                    }


                }

            }




            echo '<div class="inf_Lot"><h2 class="h2_Lot">Начальная цена: '.$price.'</h2><h2 class="h2_Lot">Блиц цена: '.$blitz_price.'</h2>';
            echo '<h2 class="h2_Lot">Дата начала аукциона: '.$start_date.'</h2><h2 class="h2_Lot">Дата конца аукциона: '.$end_date.'</h2>';

            echo ' <input id="stavka" name="stavka" type="text"  class="form-control">';

            if($status != 1) {

                echo '<input type="submit" name="submit" class="bat_Lot"  value="Сделать ставку" OnClick="Get();">';

                echo '<input type="submit" name="blid" class="bat_Lot"  value="Купить по Блиц-цене" OnClick="Get();"></div>';
            }else
            {
                echo '<h2 class="h2_Lot">Лот продан</h2>';
            }
            $statys2 = $db->query("SELECT `id`,`Login` FROM `users`");
while ($rows2 = mysqli_fetch_assoc($statys2)) {
    if ($rows2['Login'] == $_COOKIE["Login"]) {
        $id = $rows2['id'];
    }
}

            if( $_POST['submit'] == true )
            {


                $price =  $_POST['stavka'];


                $statys = $db->query("SELECT `id`,`price`,`seller`,`blitz_price` FROM `lot`");
                while ($rows = mysqli_fetch_assoc($statys))
                {
                    if($u == $rows['id'] )
                    {


                        if($id != $rows['seller'])
                                if ($price > $rows['price']) {



                                    $date = date("Y-m-d H:i:s");

                                    $db->query("INSERT INTO `bids` (`id`,`users`,`lot`,`bids`,`date`) VALUES (NULL,'$id','$u','$price','$date');");




                                    if($price >= $rows['blitz_price'])
                                    {
                                        $statys3 = $db->query("SELECT `id`,`status` FROM `status_lot`");
                                        while ($rows3 = mysqli_fetch_assoc($statys3))
                                        {
                                            if($rows3['status'] == 'Продан')
                                            {
                                                $status_lot = $rows3['id'];

                                            }
                                        }
                                        $db->query("UPDATE `lot` SET `buyer`='$id', `price` = ' $price',`status`='$status_lot' WHERE `id` = '$u';");
                                    }else
                                    {
                                        $db->query("UPDATE `lot` SET `buyer`='$id', `price` = ' $price' WHERE `id` = '$u';");
                                    }
                                    header("Refresh:0");

                                } else {
                                    echo '<h2 class="h2_Lot">Ваша ставка ниже текущей </h2>';
                                }
                            else
                            {
                                 echo '<h2 class="h2_Lot">Вы являетесь продавцом данного лота</h2>';
                            }



                            }


                    }


                }




            if( $_POST['blid'] == true )
            {
                $staty = $db->query("SELECT `id`,`price`,`seller`,`blitz_price` FROM `lot`");

                while ($row = mysqli_fetch_assoc($staty))
                {
                    if($u == $row['id'] )
                    {
                        $statys2 = $db->query("SELECT `id`,`status` FROM `status_lot`");
                        while ($rows2 = mysqli_fetch_assoc($statys2))
                        {
                            if($rows2['status'] == 'Продан')
                            {
                                $status_lot = $rows2['id'];

                            }
                        }
                        $statys3 = $db->query("SELECT `id`,`Login` FROM `users`");
                        while ($rows3 = mysqli_fetch_assoc($statys3))
                        {
                            if($rows3['Login'] == $_COOKIE["Login"])
                            {
                                $id2 = $rows3['id'];
                            }
                        }

                        if($id2 != $row['seller'] ) {

                            $w = $row['blitz_price'];

                            $date2 = date("Y-m-d H:i:s");


                            $statys3 = $db->query("SELECT `id`,`Login` FROM `users`");
                            while ($rows3 = mysqli_fetch_assoc($statys3)) {
                                if ($rows3['Login'] == $_COOKIE["Login"]) {


                                    $db->query("INSERT INTO `bids` (`id`,`users`,`lot`,`bids`,`date`) VALUES (NULL,'$id2','$u','$w','$date2');");
                                    $db->query("UPDATE `lot` SET `price` = ' $w',`buyer` = '$id2',`status`='$status_lot' WHERE `id` = '$u' ;");
                                    header("Refresh:0");
                                }

                            } }
                        else
                            {
                                echo '<h2 class="h2_Lot">Вы являетесь продавцом данного лота</h2>';
                            }

                    }
                }
            }


            ?>


    </div>
    </form>
