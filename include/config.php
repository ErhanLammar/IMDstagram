<?php
/**
 * Created by PhpStorm.
 * User: erhanlammar
 * Date: 23/04/16
 * Time: 10:08
 */
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/Brussels');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','imdstagram');


try {

    //create PDO connection
    $db = new PDO("mysql:host="."localhost".";dbname="."imdstagram", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    //show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.class.php');
$users = new User($db);
?>