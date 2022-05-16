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