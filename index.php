<?php

    require_once "blok/bd.php";
    require_once "blok/header.php";


?>

    <form action="authorization.php" method="post">
        <?php
        require_once "blok/left_katalog.php";
        setcookie ("Errov", "", time() - 3600);
        ?>




        <div id="glav">

            <div id="a1" name="a1" >

                    <?php

                    $statys = $db->query("SELECT `id`, `name`,`status`,`price`,`blitz_price` FROM `lot`");

                    while ($rows = mysqli_fetch_assoc($statys))
                    {
                        $w = $rows['id'];

                        if($rows['status'] != 1)
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
                                    echo '<img class="img-container" src="'.$j2.'">';
                                    //echo $w;
                                    break;
                                }

                            }

                               echo '<p id="lot_name">'.$i.'<br>';
                            echo ''.$j.'р</p>';

                                echo '</a>';

                        }
                    }

                ?>

            </div>
        </div>
    </form>

    <?php
        require_once "blok/footer.php";
    ?>