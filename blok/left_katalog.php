<div id="kateg">

        <?php
            $statys = $db->query("SELECT `id`, `type` FROM `type_lot`");

            while ($rows = mysqli_fetch_assoc($statys))
            {
                $i = $rows['type'];
                $tupe_lot = $rows['id'];
                echo '<a class="a_katalog" href="../katalog.php/'. $tupe_lot.'">'.$i.'</a><br>';
            }

        ?>

    </div>


