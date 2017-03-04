<?php
/**
 * Created by PhpStorm.
 * User: Naylor
 * Date: 2016/4/20
 * Time: 20:02
 */
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";
include_once 'model.php';
require_once 'E:/phpExcelReader/Excel/reader.php';
error_reporting(E_ALL ^ E_NOTICE);
$dir=dirname(__FILE__);
$dir=str_replace("//","/",$dir)."/";
$filename='input.xls';
$result=move_uploaded_file($_FILES['file']['tmp_name'],$dir.$filename);
if($result)
{
    $data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('utf-8');

    $data->read("$filename");

    $_SESSION['RE'] = 1;

    for ($i = 2; $i < $data->sheets[0]['numRows']; $i++)
    {
        if ($data->sheets[0]['cells'][$i][1] == "") break;
        $RE = insert($data->sheets[0]['cells'][$i][1], $data->sheets[0]['cells'][$i][2], $data->sheets[0]['cells'][$i][3],
            $data->sheets[0]['cells'][$i][4], $data->sheets[0]['cells'][$i][5], $data->sheets[0]['cells'][$i][6], $data->sheets[0]['cells'][$i][7]);
        if ($RE == 0){
            $_SESSION['RE'] = 0;
            echo "<script>location.href='large_insert.php';</script>";
        }
    }
    $total_Num=$data->sheets[0]['numRows']-2;
    echo "导入成功！";
    unlink("$filename");
}
else
{
    echo "上传失败";
}
echo "<script>location.href='large_insert.php';</script>";
?>