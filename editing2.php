<link rel="stylesheet"  href="../CSS/Style.css">
<?php
$db = new mysqli
(
    'std-mysql.ist.mospolytech.ru',
    'std_1926_bd',
    '12345678',
    'std_1926_bd'
);
mysqli_set_charset($db,"utf8");

if (!$db) {
    die('Error connect to DataBase');
}
require_once "blok/bd.php";
require_once "blok/header.php";
require_once "blok/menu.php";
require_once "blok/left.php";
echo ' <div id="glav">';




echo ' <form action="office.php" method="post">';
echo  '   
                        <label>Название лота:</label><br>
                        <input name="name2" type="text" size="15" maxlength="15" class="form-control" style="width: 300px;" value=""><br>
                        <label>Категория лота:</label><br>
                        
                        <select name="type2">
                    ';

$statys = $db->query("SELECT `id`, `type` FROM `type_lot`");

while ($rows = mysqli_fetch_assoc($statys))
{

    echo '<option>'. $rows['type'].'</option>';

}

echo '</select><br><br>';

echo  ' 
                    <label>Начальная цена:</label><br>
                    <input name="price2" type="text" size="15" maxlength="15" class="form-control" style="width: 300px;" value=""><br>
                    <label>Блиц-цена:</label><br>
                    <input name="blitz_price2" type="text" size="15" maxlength="15" class="form-control" style="width: 300px;" value=""><br>
                    <input type="submit" name="submit8" class="btn btn-success" style="width: 300px;background-color: #3f51b5;" value="Выставить" OnClick="Get();">
                   
                    ';




if( $_POST['submit8'] == true  )
{
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $statys2 = $db->query("SELECT `id`, `name`,`buyer`,`status`,`price`,`blitz_price` FROM `lot`");


    while ($rows2 = mysqli_fetch_assoc($statys2))
    {
        $url2='http://auction.std-1926.ist.mospolytech.ru/editing2.php/'.$rows2['id'];

        if($url == $url2)
        {
            $u = $rows2['id'];

        }

    }


    $statys3 = $db->query("SELECT `id`, `type` FROM `type_lot`");

    while ($rows3 = mysqli_fetch_assoc($statys3)) {
        if ($rows3['type'] == $_POST['type2']) {
            $type = $rows3['id'];
        }
    }


    $name = $_POST['name2'];

    $price = $_POST['price2'];
     $blitz_price = $_POST['blitz_price2'];



    $db->query("UPDATE  `lot` SET  `name` = '$name', `type`='$type', `price`='$price', `blitz_price`='$blitz_price' WHERE `id` = '$u' ;");



}




