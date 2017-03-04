<?php
header("Content-type:text/html;charset=utf-8");
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";

?>
<html>
<head>
	<title>借书操作</title>
</head>
<body bgcolor=#ffffff>
	<h1 align="center">借书</h1>
	<hr>
	<br>
	<br>
<?php
	$bcid=$_GET['bcid'];
	$bkid=$_GET['bkid'];
	if(empty($bcid))
		die("借书证号不能为空"."<a herf='brweb.php'>重新输入</a>");
	if(empty($bkid))
		die("图书号码不能为空"."<a herf='brweb.php'>重新输入</a>");
	$host="localhost";
	$user="root";
	$pwd="";
	$db_name="library";
	$conn=mysqli_connect($host,$user,$pwd,$db_name) or die("连接数据库服务器失败".mysql_error());

	mysqli_query($conn,"set names 'utf-8'");

	$sql1=mysqli_query($conn,"select * from card where card_id= '$bcid' ");
	$result1 = mysqli_fetch_array($sql1);
	if(empty($result1))
	{
		echo "<script language='javascript'>alert('借书证输入错误');history.back();</script>";exit;
	}

	$sql1 = mysqli_query($conn,"select * from book where book_id = '$bkid'");
	$result1 = mysqli_fetch_array($sql1);
	if(empty($result1))
	{
		echo "<script language='javascript'>alert('书号输入错误');history.back();</script>";exit;
	}

	if($result1['stock']==0){
		$sql2 = mysqli_query($conn,"select min(return_date) from record where book_id = '$bkid' ");
		$result2 = mysqli_fetch_array($sql2);
		echo "<script language='javascript'>alert('你要借的书库存不足，最近归还时间为'.$result2[0]);history.back();</script>";exit;
	}

	else{
	$a = date('Y-m-d');
	$date = date('Y-m-d',strtotime('+30 Day',strtotime($a)));
	$stock = $result1['stock']-1;
	//$sql3=mysql_query("select max(record_id) as max from record ");
	//$maxid=mysql_fetch_array($sql3);
		$user1=$_SESSION['id'];
		$cmd="insert into record values(NULL,'".$bkid."','".$bcid."','".$user1."','".$a."','".$date."')";
		echo $cmd;
	mysqli_query($conn,"update book set stock='$stock' where book_id='$bkid'") or die("更新失败".mysql_error());;
	mysqli_query($conn,$cmd) or die("插入失败");
	echo "<script language='javascript'>alert('借书成功');history.back();</script>";}
?>
</body>
</html>