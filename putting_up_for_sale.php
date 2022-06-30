<?php

require_once "blok/bd.php";
require_once "blok/header.php";
require_once "blok/menu.php";
require_once "blok/left.php";

echo ' <div id="glav">';


            echo  '   
                       <form method="post" action="putting_photo.php" enctype="multipart/form-data">
                  

                        <label id="lb7">Название лота:</label>
                        <input name="name" type="text" size="15" maxlength="15" class="form-control3"  value="">
                        <label id="lb7">Категория лота:</label>
                        
                        <select id="lb6" name="type">
                    ';

            $statys = $db->query("SELECT `id`, `type` FROM `type_lot`");

            while ($rows = mysqli_fetch_assoc($statys))
            {

                echo '<option>'. $rows['type'].'</option>';

            }

            echo '</select>';

            echo  ' 
                    <label id="lb7">Начальная цена:</label>
                    <input name="price" type="text" size="15" maxlength="15" class="form-control3"  value="">
                    <label id="lb7">Блиц-цена:</label>
                    <input name="blitz_price" type="text" size="15" maxlength="15" class="form-control3"  value="">
                    <label id="lb7">Срок аукциона(кол-во дней):</label>
                    <input name="end_date" type="text" size="15" maxlength="15" class="form-control3"  value=""><br>
                 
                       <input type="submit" name="submit6" class="upload"  value="Добавить фото" OnClick="Get();">


             
             ';



             echo ' </form>';


/*  <label id="lb7" for="inputfile">Фото лота</label> */



//move_uploaded_file($_FILES['uploadbtn']['tmp_name'],$uploaddir.$_FILES['uploadbtn']['name'])














?>
