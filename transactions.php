<?php

require_once "blok/bd.php";
require_once "blok/header.php";
require_once "blok/menu.php";
require_once "blok/left.php";

echo ' <div id="glav">';
echo '<form action="chat.php" method="post">';



$statys2 = $db->query("SELECT `id`,`Login` FROM `users`");
while ($rows2 = mysqli_fetch_assoc($statys2)) {
    if ($rows2['Login'] == $_COOKIE["Login"]) {
        $id = $rows2['id'];
    }
}

$statys = $db->query("SELECT `id`, `seller` ,`name`,`buyer`,`status`,`price`,`blitz_price` FROM `lot`");


while ($rows = mysqli_fetch_assoc($statys))
{
    if($rows['status'] == 1 && $rows['seller'] == $id )
    {
        $w = $rows['id'];
        $statys2 = $db->query("SELECT `id`,`photo`,`lot` FROM `photo`");

        while ($rows2 = mysqli_fetch_assoc($statys2))
        {
            $i2 = $rows2['id'];

            $x2 = $rows2['lot'];

            if($w == $x2 )
            {
                $j2 = $rows2['photo'];

            }

        }
        echo '<div id="img5"><img  class="img-container3" src="'.$j2.'"><a   href="../chat.php/'.$rows['id'].'" ><div  class="submit_purchased7">Чат</div></a><h3 class="name_pur">'.$rows['name'].'</h3><br><h3 class="name_pur"> Цена: '.$rows['price'];
        echo ' рублей</h3></div>';


    }
}
echo '</form></div>';
