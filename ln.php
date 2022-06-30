<link rel="stylesheet"  href="../CSS/Style.css">
<?php
if($_COOKIE["Login"] !=0) {

    require_once "blok/bd.php";
    require_once "blok/header.php";
    require_once "blok/menu.php";
    require_once "blok/left.php";

    $_COOKIE["Butt2"] = false;

    echo ' <div id="glav">';


    if ($_POST['submit1'] == true) {

        $_COOKIE["Butt3"] = false;
        require_once "blok/purchased_lots.php";
    }
    if ($_POST['submit4'] == true) {

        $_COOKIE["Butt3"] = false;

        require_once "blok/exposed_lots.php";
    }

    if ($_POST['submit3'] == true) {
        $_COOKIE["Butt2"] = false;

        require_once "blok/transactions.php";
    }
    if ($_POST['submit2'] == true || $_COOKIE["Butt2"] == true) {

        require_once "putting_up_for_sale.php";
    }


    echo "</div>";

}else
{
    require_once"authorization.php";
}






