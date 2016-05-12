<?php
/**
 * Created by PhpStorm.
 * User: erhanlammar
 * Date: 23/04/16
 * Time: 11:00
 */
require('include/config.php');

//logout
$user->logout();

//logged in return to index page
header('Location: login.php');
exit;
?>