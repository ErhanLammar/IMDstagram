<?php
/**
 * Created by PhpStorm.
 * User: erhanlammar
 * Date: 14/05/16
 * Time: 08:55
 */
include_once ("Db.class.php");
session_start();
$check=$_SESSION['login_username'];
$session=mysqli_query("SELECT username FROM `users` WHERE username='$check' ");
$row=mysqli_fetch_array($session);
$login_session=$row['username'];
if(!isset($login_session))
{
    header("Location:homepage.php");
}
?>