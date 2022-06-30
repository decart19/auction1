<?php

require_once "blok/bd.php";
require_once "blok/header.php";
?>
    <link rel="stylesheet"  href="../CSS/Style.css">
<?php
require_once "blok/menu.php";


$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$statys = $db->query("SELECT `id` FROM `type_lot`");




    while ($rows = mysqli_fetch_assoc($statys))
    {

        $url2='http://auction.std-1926.ist.mospolytech.ru/katalog.php/'.$rows['id'];

        if($url2 == $url)
        {
            $type_lot=$rows['id'];
        }


    }

?>

    <form action="authorization.php" method="post">


        <?php
        require_once "blok/left_katalog.php";
        ?>

        <div id="glav">

            <div id="a1" name="a1" >

                    <?php

                    $statys = $db->query("SELECT `id`, `type` ,`name`,`status`,`price`,`blitz_price` FROM `lot`");

                    while ($rows = mysqli_fetch_assoc($statys))
                    {
                        $w = $rows['id'];

                        if($rows['status'] != 1)
                        {
                            if($type_lot == $rows['type'])
                            {
                                echo '<a  href="../Lot.php/'.$rows['id'].'" id="lot" name="lot" value="i$w">';

                                $i = $rows['name'];
                                $j = $rows['price'];
                                $x = $rows['blitz_price'];

                                $statys2 = $db->query("SELECT `id`,`photo`,`lot` FROM `photo`");

                                while ($rows2 = mysqli_fetch_assoc($statys2))
                                {
                                    $i2 = $rows2['id'];
                                    $j2 = $rows2['photo'];
                                    $x2 = $rows2['lot'];

                                    if($w == $x2 )
                                    {
                                        echo '<img class="img-container" src="../'.$j2.'">';
                                        //echo $w;
                                        break;
                                    }

                                }

                                   echo '<p id="lot_name">'.$i.'<br>';
                                    echo ''.$j.'р</p></a>';


                            }
                        }
                    }

                ?>

            </div>
        </div>
    </form>

    <?php
        require_once "blok/footer.php";
    ?>