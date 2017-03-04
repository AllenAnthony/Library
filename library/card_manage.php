<html>
　　<head>
    <title>card_manage</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
        .title
        {
            font-size:26px;
        }
    </style>
</head>
　　<body bgcolor=#ffffff align="center">
　　<h1 align="center">card management</h1>

<?php

session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";
/*$insert_card_id=$_REQUEST['insert_card_id'];
$delete_card_id=$_REQUEST['delete_card_id'];*/
@$insert_card_name=$_REQUEST['insert_card_name'];
@$delete_card_name=$_REQUEST['delete_card_name'];
@$insert_card_depa=$_REQUEST['insert_card_depa'];
@$delete_card_depa=$_REQUEST['delete_card_depa'];
@$ins_kind=$_REQUEST['ins_kind'];
@$del_kind=$_REQUEST['del_kind'];

@$db=new mysqli('localhost','root','','library');

if(mysqli_connect_errno())
{
    echo 'error: could not connect the database';
    exit;
}


if(/*!$insert_card_id || */(!$insert_card_name || !$insert_card_depa) && (!$delete_card_name || !$delete_card_depa))
{
    echo"<p>please input all the information needed</p> ";
    exit;
}

if(/*!$insert_card_id || */$insert_card_name && $insert_card_depa )
{
    $query_ins = "select * from library.card where library.card.name ='".$insert_card_name.
        "' and library.card.department ='".$insert_card_depa.
        "' and library.card.kind ='".$ins_kind."'";

    $db->query("set names 'utf8'");
    $result_ins = $db->query($query_ins);

    if (!$result_ins)
    {
        echo "<h3>insert query error</h3><br>";
    }

    $num_result_ins=$result_ins->num_rows;
    $db->close();
    $db=new mysqli('localhost','root','','library');
    if($num_result_ins!=0)
    {
        echo"your card has existed";
    }
    else
    {
        $query_ins = "insert into card(card_id,name,department,kind) values (NULL,'".$insert_card_name."','".$insert_card_depa."','".$ins_kind."')";
        $db->query("set names 'utf8'");
        $result_ins = $db->query($query_ins);
        if($result_ins)
        {
            echo "<div align='center' font-size='9px'>".$db->affected_rows." card inserted into database ";
            echo "</div><br>";
        }
        else
        {
            echo"An error has occurred, the card is not inserted";
            echo"<br>";
        }
    }
}
else if(/*!$insert_card_id || */$delete_card_name && $delete_card_depa )
{
    $query_del = "select * from library.card where library.card.name ='".$delete_card_name.
        "' and library.card.department ='".$delete_card_depa.
        "' and library.card.kind ='".$del_kind."'";


    $db->query("set names 'utf8'");
    $result_del = $db->query($query_del);

    if (!$result_del)
    {
        echo "<h3>delete query error</h3><br>";
    }

    $num_result_del=$result_del->num_rows;

    if($num_result_del==0)
    {
        echo"the card is not existed";
    }
    else
    {
        $query_del = "delete from card where library.card.name='".$delete_card_name
            ."'and library.card.department='".$delete_card_depa
            ."'and library.card.kind='".$del_kind."'";

        $db->query("set names 'utf8'");
        $result_del = $db->query($query_del);
        if($result_del)
        {
            echo $db->affected_rows." card deleted from database ";
            echo "<br>";
        }
        else
        {
            echo"An error has occurred, the card is not deleted";
            echo"<br>";
        }
    }
}


$db->close();


?>
</body>
</html>




<!--$query_del = "select * from library.card where library.card.card_id = '".$delete_card_id.
"' and library.card.name ='".$delete_card_name.
"' and library.card.department ='".$delete_card_depa.
"' and library.card.kind ='".$del_kind."'";


$result_del = $db->query($query_del);

if($insert_card_id && $insert_card_name && $insert_card_depa )
{


}-->