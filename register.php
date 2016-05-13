<?php
include_once("classes/User.class.php");
//require('include/config.php');

//if logged in redirect to members page
//if( $users->is_logged_in() ){ header('Location: homepage.php'); }

//if form has been submitted process it
if(isset($_POST['register'])){

    // todo: 1 form input velden ophalen
    try{
        $u = new User();
        $u->Username = $_POST['form-username'];
        $u->Firstname = $_POST['form-first-name'];
        $u->Lastname = $_POST['form-last-name'];
        $u->Email = $_POST['form-email'];
        $u->Password = $_POST['form-password'];
        $u->Passwordconfirmation = $_POST['form-passwordconf'];
        $u->signup();
        $succes= "je kan nu <a href='login.php'>inloggen</a>";
    }
    catch(exception $e){
        $succes = $e->getMessage();
    }
}
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>IMDstagram</strong> registreer pagina</h1>
                </div>
                <div class="form-control-feedback">
                <?php if(isset($succes)) {
                    echo "<p> $succes</p>";
                }
                ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Registeren op de instagram van IMD</h3>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input type="text" name="form-username" placeholder="Gebruikersnaam..." class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-first-name">Voornaam</label>
                                <input type="text" name="form-first-name" placeholder="Voornaam..." class="form-first-name form-control" id="form-first-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-last-name">Achternaam</label>
                                <input type="text" name="form-last-name" placeholder="Achternaam..." class="form-last-name form-control" id="form-last-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-email">Password</label>
                                <input type="text" name="form-email" placeholder="email..." class="form-email form-control" id="form-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="form-password" placeholder="wachtwoord..." class="form-password form-control" id="form-password">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-passwordconf">Password</label>
                                <input type="password" name="form-passwordconf" placeholder="wachtwoord bevestigen..." class="form-passwordconf form-control" id="form-passwordconf">
                            </div>
                            <button type="submit" name="register" class="btn">Registreren!</button>
                        </form>
                    </div>
                    <div class="description">
                        <p>
                            Al lid van IMDstagram hier
                            <a href="login.php"><strong>inloggen</strong></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!--[if lt IE 10]>
    <script src="assets/js/placeholder.js"></script>
    <![endif]-->

</body>

</html>