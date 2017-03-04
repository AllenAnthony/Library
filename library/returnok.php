<?php  
header("Content-type:text/html;charset=utf-8");
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";
?> 
<html>
<head>
	<title>还书操作</title>
</head>

<?php
	$bcid=$_GET['bcid'];
	$bkid=$_GET['bkid'];
	if(empty($bcid))
	{
		echo  "<script language='javascript'>alert('请输入借书证ID');history.back();</script>";
	}	
	if(empty($bkid))
	{
		echo  "<script language='javascript'>alert('请输入图书ID');history.back();</script>";
	}
	$host="localhost";
	$user="root";
	$pwd="";
	$db_name="library";
	$conn=mysql_connect($host,$user,$pwd) or die("连接数据库服务器失败".mysql_error());
	mysql_select_db($db_name,$conn) or die("连接数据库失败".mysql_error());
	//mysql_query("set names 'gb2312'");

	$sql1=mysql_query("select * from card where card_id= '$bcid' ");
	$result1 = mysql_fetch_array($sql1);
	if(empty($result1))
	{
		echo "<script language='javascript'>alert('借书证输入错误');history.back();</script>";exit;
	}

	$sql1 = mysql_query("select * from book where book_id = '$bkid'");
	$result1 = mysql_fetch_array($sql1);
	if(empty($result1))
	{
		echo "<script language='javascript'>alert('书号输入错误');history.back();</script>";exit;
	}
	
	$sql2=mysql_query("select * from record where card_id='$bcid' and book_id='$bkid'");
	$result2=mysql_fetch_array($sql2);
	if(empty($result2))
	{
		echo "<script language='javascript'>alert('该借书证没有结果此书');history.back();</script>";exit;
	}

	$stock=$result1[stock]+1;
	mysql_query("update book set stock='$stock' where book_id='$bkid'");
	mysql_query("delete from record where book_id='$bkid' and card_id='$bcid'");
	echo "<script language='javascript'>alert('还书成功');history.back();</script>";
?>
</html>
