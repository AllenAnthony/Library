<?php
/**
 * Created by PhpStorm.
 * User: Naylor
 * Date: 2016/4/20
 * Time: 19:58
 */
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE HTML>
<html lang="zh_CN">
<head>
    <charset = "utf-8">
    <title>批量入库</title>
</head>

<body>
<h1 align="center">批量入库</h1>
<div align="center">
<form action="file.php" method="post" enctype="multipart/form-data">
    <label for="file"></label>
    <input type="file" name="file" id="file" />
    <input type="submit" name="button" id="button" value="提交" />
</form>
<h2>
<?php
    if (isset($_SESSION['RE']))
        if ($_SESSION['RE'] == 1) echo "插入成功";
        else echo "插入失败";
?>
</h2>
</div>
</br>
<div align="center"><form  method="get" action="index.php"><input type="submit" value="回到首页"></form></div>
</body>
</html>
