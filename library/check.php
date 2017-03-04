<?php
/**
 * Created by PhpStorm.
 * User: Naylor
 * Date: 2016/4/16
 * Time: 21:56
 */
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$username = $_POST['username'];
if ($username == "")
{
    $_SESSION['login'] = false;
    $_SESSION['log'] = false;
    echo "<script> location.href='login.php'; </script>";
    exit;
}
$password = $_POST['password'];
$sql_hostname = "localhost";
$sql_username = "root";
$sql_password = "";
$sql_database = "library";
$link = mysqli_connect($sql_hostname, $sql_username, $sql_password, $sql_database) or die();
$query = "select manager_id from manager where name = \"$username\" and password = \"$password\"";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 1)
{
    $_SESSION['user'] = $username;
    $_SESSION['login'] = false;
    $_SESSION['log'] = true;
    echo " <script>location.href='index.php';</script> ";
}
else
{
    $_SESSION['login'] = true;
    $_SESSION['log'] = false;
    unset($_SESSION['user']);
    echo " <script>location.href='login.php';</script> ";
}
mysqli_close($link);
?>