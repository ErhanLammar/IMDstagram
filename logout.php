<?php
/**
 * Created by PhpStorm.
 * User: erhanlammar
 * Date: 23/04/16
 * Time: 11:00
 */
include_once ("classes/user.class.php");
include_once ("classes/Db.class.php");


//logout
session_start();
if(session_destroy())
{
    
    $destroyable = 'loggedIn';
    destroy();
    echo $destroyable;
    
    //logged in return to index page
    header("Location: login.php");
}

function destroy()
{
    global $destroyable;
    unset($destroyable);
}

exit;
?>
