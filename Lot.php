<?php

require_once "blok/bd.php";
require_once "blok/header.php";
?>
 <link rel="stylesheet"  href="../CSS/Style.css">
<?php
require_once "blok/menu.php";


                $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                $statys = $db->query("SELECT `id`, `name`,`price`,`blitz_price` FROM `lot`");

           echo '<form action="'.$url.'" method="post">'.'<div id="lot2" >';


            while ($rows = mysqli_fetch_assoc($statys))
            {

                $url2='http://auction.std-1926.ist.mospolytech.ru/Lot.php/'.$rows['id'];

                if($url2 == $url)
                {
                    echo '<h1>'.$rows['name'].'</h1>';
                    $u = $rows['id'];
                    $price = $rows['price'];
                    $data = time() + $rows['start_date'];


                    $statys2 = $db->query("SELECT `id`,`photo`,`lot` FROM `photo`");

                    while ($rows2 = mysqli_fetch_assoc($statys2))
                    {




                        if($u == $rows2['lot'] )
                        {
                            echo '<div id="photo"><img class="img-container" src="../'.$rows2['photo'].'"></div>';

                        }

                    }




                }


            }

            echo '<div><h2>Начальная цена: '.$price.'</h2></div>';
            echo '<div><h2>Дата начала: '.$data.'</h2></div>';
            echo ' <input id="stavka" name="stavka" type="text"  class="form-control">';
            echo '<input type="submit" name="submit" class="btn btn-success" style="width: 300px;background-color: #3f51b5;" value="Сделать ставку" OnClick="Get();">';

            echo '<input type="submit" name="blid" class="btn btn-success" style="width: 300px;background-color: #3f51b5;" value="Купить по Блиц-цене" OnClick="Get();">';


            if( $_POST['submit'] == true )
            {


                $price =  $_POST['stavka'];


                $statys = $db->query("SELECT `id`,`price`,`seller`,`blitz_price` FROM `lot`");
                while ($rows = mysqli_fetch_assoc($statys))
                {
                    if($u == $rows['id'] )
                    {

                        if($id != $rows['seller'] ) {


                                if ($price > $rows['price']) {
                                    $statys2 = $db->query("SELECT `id`,`Login` FROM `users`");
                                    while ($rows2 = mysqli_fetch_assoc($statys2)) {
                                        if ($rows2['Login'] == $_COOKIE["Login"]) {
                                            $id = $rows2['id'];
                                        }
                                    }


                                    $date = date("Y-m-d H:m:s");

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
                                        $db->query("UPDATE `lot` SET `price` = ' $price',`status`='$status_lot' WHERE `id` = '$u';");
                                    }else
                                    {
                                        $db->query("UPDATE `lot` SET `price` = ' $price' WHERE `id` = '$u';");
                                    }
                                    header("Refresh:0");

                                } else {
                                    echo "Ваша ставка ниже текущей";
                                }
                            } else {
                                echo "Вы являетесь продавцом данного лота";
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

                        if($id2 != $row['seller'] )
                        {

                            $w = $row['blitz_price'];

                            $date2 = date("Y-m-d H:m:s");

                            // $db->query("INSERT INTO `bids` (`id`,`users`,`lot`,`bids`,`date`) VALUES (NULL,'$id2','$u','$w','$date2');");
                            //$db->query("UPDATE `lot` SET `price` = ' $w',`status`='$status_lot' WHERE `id` = '$u';");
                            header("Refresh:0");
                        }else
                        {
                            echo "Вы являетесь продавцом данного лота";
                        }
                    }
                }
            }


            ?>


    </div>
    </form>
