<?php

require_once "blok/bd.php";
require_once "blok/header.php";
require_once "blok/menu.php";
require_once "blok/left.php";
echo ' <div id="glav">';






$statys2 = $db->query("SELECT `id`,`Login` FROM `users`");
while ($rows2 = mysqli_fetch_assoc($statys2)) {
    if ($rows2['Login'] == $_COOKIE["Login"]) {
        $seller = $rows2['id'];
    }
}


$statys = $db->query("SELECT `id`, `type` FROM `type_lot`");

while ($rows = mysqli_fetch_assoc($statys)) {
    if ($rows['type'] == $_POST['type']) {
        $type = $rows['id'];
    }
}



$i ="true";
setcookie("Butt2", $i);
$name = $_POST['name'];

$price = $_POST['price'];
$blitz_price = $_POST['blitz_price'];
$d = $_POST['end_date'];
$start_date = date('Y-m-d H:m:s');
$end_date = date('Y-m-d H:m:s');
$end_date = new DateTime($end_date );

$end_date->add(new DateInterval('P'."$d".'D'));
$end_date = date_format( $end_date,'Y-m-d H:m:s');
//$j= date_format( $end_date,'Y-m-d H:m:s');

$buyer = 0;
$status = 2;





$db->query("INSERT INTO `lot` (`id`, `name`, `type`, `status`, `price`, `blitz_price`, `seller`, `start_date`, `buyer`, `end_date`) VALUES (NULL,'$name','$type','$status','$price','$blitz_price','$seller','$start_date','$buyer','$end_date');");






?>





<div class="content">

    <!-- Область для перетаскивания -->
    <div id="drop-files" ondragover="return false">
        <p>Перетащите изображение сюда</p>
        <form id="frm">

        </form>
    </div>
    <!-- Область предпросмотра -->
    <div id="uploaded-holder">
        <div id="dropped-files">
            <!-- Кнопки загрузить и удалить, а также количество файлов -->
            <div id="upload-button">
                <center>
                    <span>0 Файлов</span>
                    <a href="#" class="upload" style=" background:  #2c2c2c;color: #eee7f3;">Загрузить</a>

                    <!-- Прогресс бар загрузки -->
                    <div id="loading">
                        <div id="loading-bar">
                            <div class="loading-color"></div>
                        </div>
                        <div id="loading-content"></div>
                    </div>
                </center>
            </div>
        </div>
    </div>


</div>
    



