<?php
/**
 * Created by PhpStorm.
 * User: Naylor
 * Date: 2016/4/18
 * Time: 8:00
 */
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE HTML>
<html lang="zh_CN">
<head>
    <charset = "utf-8">
    <title>图书入库</title>
</head>

<body>
<h1 align="center">单本入库</h1>

<form action = "insert.php" method = "post">
    <table border="0" align="center">

        <tr>
            <td>类别：</td>
            <td width="150px"><input name = "class"
                                     type = "text" /></td>
        </tr>

        <tr>
            <td>书名：</td>
            <td width="150px"><input name = "name"
                                     type = "text" /></td>
        </tr>

        <tr>
            <td>作者：</td>
            <td width="150px"><input type="text"
                                     name="author"></td>
        </tr>

        <tr>
            <td>出版社：</td>
            <td width="150px"><input type="text"
                                     name="press"></td>
        </tr>

        <tr>
            <td>出版年份：</td>
            <td width="150px"><input type="number"
                                     name="year"/></td>
        </tr>

        <tr>
            <td>价格：</td>
            <td width="150px"><input type="text"
                                    name="price"/></td>
        </tr>

        <tr>
            <td>数量：</td>
            <td width="150px"><input type="text"
                                     name="stock"/></td>
        </tr>

        <tr>
            <td align="center" colspan="4"><input type="submit" name = "submit" value = "Submit" width="20px" /></td>
        </tr>
    </br>

    </table>
</form>
<h2 align="center">
<?php
if (!isset($_SESSION['insert'])) $_SESSION['insert'] = 0;
if ($_SESSION['insert'] == 1)
{
    echo "插入成功";
    $_SESSION['insert'] = 0;
}
if ($_SESSION['insert'] == -1)
{
    echo "插入失败";
    $_SESSION['insert'] = 0;
}
?>
</h2>
</br>
<div align="center"><form  method="get" action="index.php"><input type="submit" value="回到首页"></form></div>
</body>
</html>