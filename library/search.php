<html>
　　<head>
    <title>search_engine</title>
    <style type="text/css">
        .title
        {

            font-size:26px;
        }
    </style>
   </head>
　　<body bgcolor=#ffffff>
　　<h1 align="center">Search For Books</h1>

<?php

$book_name=$_REQUEST['book_name'];
$class=$_REQUEST['class'];
$press=$_REQUEST['press'];
$author=$_REQUEST['author'];
$price1=$_REQUEST['price1'];
$price2=$_REQUEST['price2'];
$year1=$_REQUEST['year1'];
$year2=$_REQUEST['year2'];


if(!$book_name)
    $book_name=addslashes($book_name);

if(!$class)
    $class=addslashes($class);

if(!$press)
    $press=addslashes($press);

if(!$author)
    $author=addslashes($author);

$db=new mysqli('localhost','root','','library');

if(mysqli_connect_errno())
{
    echo 'error: could not connect the database';
    exit;
}


$query = "select * from library.book where library.book.name like '%".$book_name.
         "%' and library.book.class like'%".$class.
         "%' and library.book.press like'%".$press.
         "%' and library.book.author like'%".$author.
         "%' and library.book.price between '".$price1."' and '".$price2.
         "' and library.book.year between '".$year1."' and' ".$year2."' order by book_id";


$result = $db->query($query);


if (!$result)
{
    echo "<h3>query error</h3><br>";
}

$num_result=$result->num_rows;

echo"<p align='center' class='title'>Number of books found: ".$num_result."</p>";

for($cou=1;$cou<=$num_result;$cou++)
{
    $row=$result->fetch_assoc();
    echo "<div align='center'>".$cou.".  ".stripcslashes($row['name']);
    echo "   作者: ".stripcslashes($row['author']);
    echo "   出版社: ".stripcslashes($row['press']);
    echo "   类别: ".stripcslashes($row['class']);
    echo "   出版年份: ".$row['year'];
    echo "   价格: ".$row['price']."<br></div>";
}

echo" <br><div align='center' class='title'>search finished</div> ";
$result->free();
$db->close();


?>
</body>
</html>
