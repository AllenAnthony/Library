<?php
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";
?>

<html>

　　<head>
    <title>card_manage_Web</title>
    <meta http-equiv="Content-Type" content="text/html " charset="utf-8" />
    <style>
        #ziti
        {
            width:100px;
            height:30px;
        }
    </style>
</head>

<body bgcolor=#ffffff>
<h1 align="center">card  management</h1>

<form action="card_manage.php" method="get">
    <table border="0" align="center">
        <tr>
            <th colspan="2" align="center"><div id="ziti" >借书证申请</div></th>
            <th><pre>    </pre></th>


            <th colspan="2" align="center"><div id="ziti" >借书证删除</div></th>
        </tr>
        <!--<tr>
            <td>
                ID:
            </td>
            <td>
                <input type="number" name="insert_card_id" min="0" step="1" value="0" />
            </td>
            <td><pre>    </pre></td>
            <td>
                ID:
            </td>
            <td>
                <input type="number" name="delete_card_id" min="0" step="1" value="0" />
            </td>
        </tr>-->
        <tr>
            <td>
                name:
            </td>
            <td>
                <input type="text" name="insert_card_name" maxlength="13" size="13" />
            </td>
            <td><pre>    </pre></td>
            <td>
                name:
            </td>
            <td>
                <input type="text" name="delete_card_name" maxlength="13" size="13" />
            </td>
        </tr>
        <tr>
            <td>
                department:
            </td>
            <td>
                <input type="text" name="insert_card_depa" maxlength="13" size="13" />
            </td>
            <td><pre>    </pre></td>
            <td>
                department:
            </td>
            <td>
                <input type="text" name="delete_card_depa" maxlength="13" size="13" />
            </td>
        </tr>
        <tr>
            <td>
                kind:
            </td>
            <td>
                <select name="ins_kind">
                    <option value="student" selected="selected">student</option>
                    <option value="teacher">teacher</option>
                    <option value="other">other</option>
                </select>

            </td>
            <td><pre>    </pre></td>
            <td>
                kind:
            </td>
            <td>
                <select name="del_kind">
                    <option value="student" selected="selected">student</option>
                    <option value="teacher">teacher</option>
                    <option value="other">other</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="申请"/>
            <td><pre>    </pre></td>
            <td colspan="2" align="center">
                <input type="submit" value="删除"/>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
