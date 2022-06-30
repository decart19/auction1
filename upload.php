<?php

require_once "blok/bd.php";
// Все загруженные файлы помещаются в эту папку
$uploaddir = 'img/';

// Вытаскиваем необходимые данные
$file = $_POST['value'];
$name = $_POST['name'];


// Получаем расширение файла
$getMime = explode('.', $name);
$mime = end($getMime);

// Выделим данные
$data = explode(',', $file);

// Декодируем данные, закодированные алгоритмом MIME base64
$encodedData = str_replace(' ', '+', $data[1]);
$decodedData = base64_decode($encodedData);

// Вы можете использовать данное имя файла, или создать произвольное имя.
// Мы будем создавать произвольное имя!


$staty = $db->query("SELECT `id` FROM `photo`");

$maxh = 0;

while ($rows2 = mysqli_fetch_assoc($staty)) {
    $h = $rows2['id'];

    if($maxh < $h)
    {
        $maxh = $h;
    }

}
$maxh++;

$randomName = $maxh. '.' ."jpg";

$maxk =0;

$statys3 = $db->query("SELECT `id` FROM `lot`");
while ($rows3 = mysqli_fetch_assoc($statys3))
{
    $k = $rows3['id'];
    if($maxk < $k)
    {
        $maxk = $k;
    }
}


$photo = "img/".$maxh. '.' ."jpg";



$db->query("INSERT INTO `photo` (`id`, `photo`, `lot`) VALUES (NULL,'$photo','$maxk');");//работает


// Создаем изображение на сервере
if (file_put_contents($uploaddir . $randomName, $decodedData)) {
    // Записываем данные изображения в БД

    echo $randomName . ":загружен успешно";
} else {
    // Показать сообщение об ошибке, если что-то пойдет не так.
    echo "Что-то пошло не так. Убедитесь, что файл не поврежден!";
}

?>