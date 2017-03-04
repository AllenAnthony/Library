<?php
/**
 * Created by PhpStorm.
 * User: Naylor
 * Date: 2016/4/16
 * Time: 21:22
 */
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE HTML>
<html lang="zh_CN">
<head>
    <charset = "utf-8">
    <title>管理员登录</title>
</head>

<body>
<div align="center"><b>管理员登录</b></div>
</br>
<div align="center">
<form action = "check.php" method = "post">
    账号:
    <input name = "username"
           type = "text" />
    </br>
    密码:
    <input name = "password"
           type = "password" />
    </br>
    <?php
        session_start();
        if (!isset($_SESSION['user']))
            if ($_SESSION['login'] == true)
                echo "账号不存在或者密码错误";
    ?>
    </br>
    <input name = "submit"
           type = "submit"
           value = "登录" />
</form>
</div>
</br>
<div align="center"><form  method="get" action="index.php"><input type="submit" value="回到首页"></form></div>
</body>
</html>