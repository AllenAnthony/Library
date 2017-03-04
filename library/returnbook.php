<?php  
header("Content-type:text/html;charset=utf-8");
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";
?> 
<head>
	<title> 还书</title>
</head>
<body bgcolor=#ffffff>
	<h1 align="center"> 还书</h1>
	<form action="search_borrow1.php" method="get">
		<table border="0" align="center">
		<p align="center">查询借书证所有已借书籍</p>
		
		<tr>
			<td  align="right">借书证卡号:</td>
			<td ><input type="text" name="card_id" size=18 maxlength=13></td>
		</tr>
		<tr>
			<td align="right"><input type="submit" name="submit" value="提交"/></td>
			<td><input type="reset" name="reset" value="重置"/></td>
		<tr>
		</table>
		<br>
		<br>
		<br>
	</form>
	<form action="returnok.php" method="get">
		<table border="0" align="center">
			<tr>
				<td>还书</td>
			</tr>
			<tr>
				<td>借书证卡号</td>
				<td width="150px"><input type="text" name="bcid" size=13 maxlength=13></td>
			</tr>
			<tr>
				<td>图书号码:</td>
				<td width="150px"><input type="text" name="bkid" size=13 maxlength=13></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit1" value="提交"/></td>
				<td><input type="reset" name="reset1" value="重置"/></td>
			</tr>
		</table>
	</form>
	<div align="center"><form  method="get" action="index.php"><input type="submit" value="回到首页"></form></div>