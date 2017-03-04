<html>

　　<head>
    <title>SearchWeb</title>
   </head>

<body bgcolor=#ffffff>
<h1 align="center">Search For Books</h1>

<form action="search.php" method="get">
    <table border="0" align="center">
        <tr>
            <td>书名：</td>
            <td width="150px"><input type="text" name="book_name" maxlength="13" size="13"></td>
        </tr>

        <tr>
             <td>类别：</td>
             <td width="150px"><input type="text" name="class" maxlength="13" size="13"></td>
        </tr>

        <tr>
            <td>出版社：</td>
            <td width="150px"><input type="text" name="press" maxlength="13" size="13"></td>
        </tr>

        <tr>
            <td>作者：</td>
            <td width="150px"><input type="text" name="author" maxlength="13" size="13"></td>
        </tr>

        <tr>
            <td>价格：</td>
            <td width="50px"><input type="number" name="price1" min="0" step="0.01" value="0" /></td>
            <td>---</td>
            <td width="50px"><input type="number" name="price2" min="0" step="0.01" value="0" /></td>
        </tr>

        <tr>
            <td>出版年份：</td>
            <td width="20px"><input type="number" name="year1" min="0000" max="9999" value="2000" /></td>
            <td>---</td>
            <td width="50px"><input type="number" name="year2" min="0000" max="9999" value="2016" /></td>
        </tr>
        <tr>
            <td align="center" colspan="4"><input type="submit" width="20px" /></td>
        </tr>
    </table>
</form>
<div align="center"><form  method="get" action="index.php"><input type="submit" value="回到首页"></form></div>
</body>
</html>




