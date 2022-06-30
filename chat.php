<?php


require_once "blok/bd.php";
require_once "blok/header.php";
?>
    <link rel="stylesheet"  href="../CSS/Style.css">


<?php


require_once "blok/menu.php";
require_once "blok/left.php";

$lg= $_COOKIE['Login'];

$statys = $db->query("SELECT `Login`, `id` FROM `users`");

while ($rows = mysqli_fetch_assoc($statys))
{

    $i = $rows['Login'];
    $j = $rows['id'];


    if ($i == $lg )
    {
        $log =  $j;

    }

}


$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$statys = $db->query("SELECT `id`, `name`,`price`,`blitz_price` FROM `lot`");




while ($rows = mysqli_fetch_assoc($statys))
{

    $url2='http://auction.std-1926.ist.mospolytech.ru/chat.php/'.$rows['id'];

    if($url2 == $url)
    {
        $lot_id = $rows['id'];

    }

}

echo ' <div id="glav"> <form  method="post">';



echo '<input name="tx" type="text" size="15"  class="pole2" value="">
             <input type="submit" id="submit6" name="submit0"   value="Отправить" OnClick="Get();"><br><div id="stor">';



    $staty = $db->query("SELECT * FROM `chat` ORDER BY `id` DESC  ");

    while ($row = mysqli_fetch_assoc($staty))
    {
        if($row['lot'] ==  $lot_id)
        {
            if($row['user'] != $log )
            {
                echo '<h3 class="h3_chat">'.$row['text'].'</h3>';
            }else
            {
                echo '<h3 class="h3_chat2">'.$row['text'].'</h3>';
            }
        }
    }





if( $_POST['submit0'] == true )
{
    $text = $_POST['tx'];

    if($_POST['tx'] != " ") {
        $db->query("INSERT INTO `chat` (`id`, `text`, `lot`,`user`) VALUES (NULL,'$text',' $lot_id ','$log');");//работает

    }else
    {
     echo "сообщение не введено  ";
    }
}
echo '  </div> 
</form>

<script>setInterval(function(){
$("#stor").load("# #stor"); }, 1000); // 1000 это 1 секунда
</script>

</div>';