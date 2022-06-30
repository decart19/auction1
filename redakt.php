<?php
    require_once "blok/bd.php";
    require_once "blok/header.php";
    ?>
        <link rel="stylesheet"  href="../CSS/Style.css">
    <?php
    require_once "blok/menu.php";
    require_once "blok/left.php";


    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];






    echo ' <div id="glav">


<form method="post" action="putting_photo.php" enctype="multipart/form-data">';

$statys = $db->query("SELECT `id`, `name`, `type`, `status`, `price`, `blitz_price`, `seller`, `start_date`, `buyer`, `end_date` FROM `lot`");




while ($rows = mysqli_fetch_assoc($statys))
{

    $url2='http://auction.std-1926.ist.mospolytech.ru/redakt.php/'.$rows['id'];

    if($url2 == $url)
    {
        $id_lot = $rows['id'];
        $name = $rows['name'];
        $type = $rows['type'];
        $price = $rows['price'];
        $blitz_price = $rows['blitz_price'];


    }
}





    echo  ' <label id="lb7">Название лота:</label>
              
                        <input name="name" type="text" size="15" maxlength="15" class="form-control3"  value="'.$name.'">
                        <label id="lb7">Категория лота:</label>

                        <select id="lb6" name="type" >';


            $statys = $db->query("SELECT `id`, `type` FROM `type_lot`");

            while ($rows = mysqli_fetch_assoc($statys))
            {

                    echo '<option>' . $rows['type'] . '</option>';

            }

            echo '</select>';

            echo  '
                    <label id="lb7">Начальная цена:</label>
                    <input name="price" type="text" size="15" maxlength="15" class="form-control3"  value="'.$price.'">
                    <label id="lb7">Блиц-цена:</label>
                    <input name="blitz_price" type="text" size="15" maxlength="15" class="form-control3"  value="'.$blitz_price.'"><br>
                   
                    






    ';



             echo ' </form><div id="drop-files" ondragover="return false">
    <p>Перетащите изображение сюда</p>
    
</div>
<form id="frm" style="width: 300px;background-color: #3f51b5;">
        <input type="file"   id="uploadbtn" multiple />
    </form>
<div class="content">


    <!-- Область предпросмотра -->
    <div id="uploaded-holder">
        <div id="dropped-files">

        </div>
    </div>

    <!-- Кнопки загрузить и удалить, а также количество файлов -->
    
    
    <div id="upload-button">
        <center>
            <span>0 Файлов</span>

            <input type="submit" name="submit6" class="upload" style="width: 20%;background-color: #3f51b5;" value="Выставить" OnClick="Get();">

          

        </center>
    </div>
    
</div>
';



    echo '</div>';