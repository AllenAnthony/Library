<?php  
header("Content-type:text/html;charset=utf-8");
?> 
<html>
	<head>
    <title>已借书籍</title>
    <style type="text/css">
        .title
        {

            font-size:26px;
        }
    </style>
</head>
<body bgcolor=#ffffff>
	<h1 align="center">重新输入</h1>
	<hr>
	<br>
	<br>
<?php
	$card_id=$_GET['card_id'];
	if(empty($card_id))
		die("借书证号不能为空"."<a herf='brweb.php'>重新输入</a>");
	$tb_name="card";
	$host="localhost";
	$user="root";
	$pwd="";
	$db_name="library";
	$conn=mysql_connect($host,$user,$pwd) or dei("连接数据库服务器失败".mysql_error());
	mysql_select_db($db_name,$conn) or die("连接数据库失败".mysql_error());
	//mysql_query("set names 'gb2312'");
	$data=mysql_query("select * from record , book where card_id='$card_id' and book.book_id=record.book_id  ") or die("<br>申请失败<br>");
	$rec_count=mysql_num_rows($data);
	$fds_count=mysql_num_fields($data);
	print '<table width= "800" border="1"> ';
	print '<tr>';
	print '<td> 序号 </td>';
	for($j=0;$j<$fds_count;$j++)
	{
		$fd_name=mysql_field_name($data,$j);
		print '<td>'.$fd_name.'</td>';
	}
	print '</tr>';
	$i=1;
	while($rec=mysql_fetch_array($data))
	{
		print '<tr>';
		print '<td>'.$i.'</td>';
		for($j=0;$j<$fds_count;$j++)
		{
			if(strlen(trim($rec[$j]))<=0)
			{
				print '<td>'.$rec[$j].'</td>';
			}
			else
			{
				print '<td>'.$rec[$j].'</td>';
			}
		}
		print '</tr>';

		$i=$i+1;
	}
	print '</table>';
	print "<hr><a href=brweb.php>返回</a>";
?>
</body>
</html>