<?php
if(!isset($_SESSION))
{
session_start();
}
if($_SESSION['login'])
{
    echo "";
}
else{
    header("Location:login.php");
}
?>