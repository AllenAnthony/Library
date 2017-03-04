<?php
/**
 * Created by PhpStorm.
 * User: Naylor
 * Date: 2016/4/20
 * Time: 20:46
 */
function insert( $book_name, $class, $author,$press, $year, $price ,$stock)
{
    $sql_hostname = "localhost";
    $sql_username = "root";
    $sql_password = "";
    $sql_database = "library";
    $link = mysqli_connect($sql_hostname, $sql_username, $sql_password, $sql_database) or die();

    $query = "select * from book where name = '$book_name' and class = '$class'
and press = '$press' and author = '$author' and year = $year;";

    $result = mysqli_query($link, $query);
    $num_result = $result->num_rows;
    if ($num_result) {
        $row = $result->fetch_assoc();
        $book_id = $row['book_id'];
        $total = $row['total'] + $stock;
        $stock = $row['stock'] + $stock;
        $query = "update book set total = $total, stock = $stock where book_id = $book_id";
        $result = $link->query($query);
    } else {
        $total = $stock;
        $query = "insert into book values( NULL , '$class' , '$book_name' , '$press' , $year , '$author' , $price , $total , $stock)";
        $result = mysqli_query($link, $query);
    }

    mysqli_close($link);
    if ($result == false) {
        return 0;
    } else {
        return 1;
    }
}
?>