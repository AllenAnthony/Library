<?php
/**
 * Created by PhpStorm.
 * User: Naylor
 * Date: 2016/4/20
 * Time: 18:37
 */
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";
include_once 'model.php';
error_reporting(E_ALL ^ E_NOTICE);
$book_name = $_POST['name'];
$class = $_POST['class'];
$author = $_POST['author'];
$press = $_POST['press'];
$year = $_POST['year'];
$price = $_POST['price'];
$stock = $_POST['stock'];

$result = insert( $book_name, $class, $author,$press, $year, $price ,$stock);

if($result == 0){
    $_SESSION['insert'] = -1;
}
else{
    $_SESSION['insert'] = 1;
}
echo " <script>location.href='insert_web.php';</script> ";
?>