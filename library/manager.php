<?php
/**
 * Created by PhpStorm.
 * User: Naylor
 * Date: 2016/4/17
 * Time: 22:57
 */
error_reporting(7);
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] == false) echo " <script>location.href='login.php';</script> ";
?>