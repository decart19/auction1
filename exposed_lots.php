<?php

require_once "blok/bd.php";
require_once "blok/header.php";
require_once "blok/menu.php";
require_once "blok/left.php";


echo ' <div id="glav">';

$statys2 = $db->query("SELECT `id`,`Login` FROM `users`");
while ($rows2 = mysqli_fetch_assoc($statys2)) {
    if ($rows2['Login'] == $_COOKIE["Login"]) {
        $id = $rows2['id'];
    }
}

echo ' <form  method="post">';
$statys = $db->query("SELECT `id`, `seller` ,`name`,`buyer`,`status`,`price`,`blitz_price` FROM `lot`");


while ($rows = mysqli_fetch_assoc($statys)) {
    if ($rows['status'] == 2 && $rows['seller'] == $id) {
        $w = $rows['id'];
        $statys2 = $db->query("SELECT `id`,`photo`,`lot` FROM `photo`");

        while ($rows2 = mysqli_fetch_assoc($statys2)) {
            $i2 = $rows2['id'];

            $x2 = $rows2['lot'];

            if ($w == $x2) {
                $j2 = $rows2['photo'];

            }

        }
        echo '
                <div id="blok2" name="a.$w.">
                <img  class="img-container3" src="' . $j2 . '"><a  href="editing2.php/' . $w . '"><a href="../redakt.php/'.$w .'" id="red_exposed">Редактировать</a></a> 
                <input type="submit" id="but2" name="submit_yd' . $w . '"  value="Удалить" OnClick="Get();">
               <h3 class="name_pur">' . $rows['name'] . '</h3><br><h3 class="name_pur"> Цена: ' . $rows['price'];
        echo ' рублей</h3>
        
        
        
                </div>';
//echo "submit_yd".$w;





    if( $_POST['submit_yd'.$w] == true  )
    {
        $y = $w;






        $statys2 = $db->query("SELECT `id`,`photo`,`lot` FROM `photo`");

        while ($rows2 = mysqli_fetch_assoc($statys2)) {
            $i2 = $rows2['id'];

            $x2 = $rows2['lot'];

            if ( $x2 == $y) {

                $db->query(" DELETE FROM `photo` WHERE `id` =' $i2' ");// работакт
            }

        }
        $db->query(" DELETE FROM `lot` WHERE `id` ='$y' ");// работакт

        header("Refresh:0");


    }
}

}echo ' </form>
 

 
 
 ';

