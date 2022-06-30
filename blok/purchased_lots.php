<?php


$statys2 = $db->query("SELECT `id`,`Login` FROM `users`");
while ($rows2 = mysqli_fetch_assoc($statys2)) {
    if ($rows2['Login'] == $_COOKIE["Login"]) {
        $id = $rows2['id'];
    }
}


$statys = $db->query("SELECT `id`, `name`,`buyer`,`status`,`price`,`blitz_price` FROM `lot`");


while ($rows = mysqli_fetch_assoc($statys))
{
    if($rows['status'] == 1 && $rows['buyer'] == $id )
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
        echo '<div id="img5"> <a   href="../chat.php/'.$rows['id'].'" ><div  class="submit_purchased7">Чат</div></a><img  class="img-container2" src="'.$j2.'"><h3 class="name_pur">'.$rows['name'].'</h3><br><h3 class="name_pur"> Цена: '.$rows['price'].' рублей</h3>';

        echo '</div>';

    }
}

?>