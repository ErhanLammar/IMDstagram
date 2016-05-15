<?php
/**
 * Created by PhpStorm.
 * User: erhanlammar
 * Date: 23/04/16
 * Time: 09:31
 */

session_start();
if(!isset($_SESSION['loggedIn'])){
    echo("not set");
    header("Location:Login.php");
}

?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homepagina</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">IMDStagram</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a class="nav-profilepic pull-left" href="profilepage.php"><img src="http://placehold.it/30x30"> </a>
                    <div class="btn-group">
                        <button type="button" class="dropdown-toggle menuke" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="profilepage.php">Mijn Profiel</a></li>
                            <li><a href="#uploadbox" data-toggle="modal">Upload foto</a></li>
                            <li><a href="editprofile.php">Bewerk persoonlijke gegevens</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php">Uitloggen</a></li>
                        </ul>
                    </div>

                </li>


            </ul>
            <div class="col-sm-3 col-md-3">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Latest Posts</h1>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#instagramfoto" data-toggle="modal">
                <img class="img-responsive" src="http://placehold.it/400x400" alt="">
            </a>
        </div>

    </div>

    <hr>

    <!-- Footer -->
    <footer class="navbar-inverse navbar-fixed-bottom">
    </footer>

</div>
<!-- /.container -->
<div class="modal fade" id="uploadbox" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Upload je foto</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">


        <div class="form-group">
            <label for="exampleInputEmail1">Beschrijving</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="beschrijving..." name="beschrijving"/>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">selectteer je bestand</label>
            <input type="file" class="form-control" id="exampleInputFile" name="vraag_picture">
        </div>

        <button type="submit" class="btn btn-default">Upload</button>

    </form>
            </div>
        </div>
    </div>
</div>
<!-- End modal upload-->

<div class="modal fade" id="instagramfoto" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
               <img class="img-responsive" src="http://placehold.it/400x400" alt="">
                <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Reactie's</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Een reactie toevoegen" name="reageren"/>
        </div>

        <button type="submit" class="btn btn-default">Verzenden</button>

    </form>
            </div>
        </div>
    </div>
</div>

<!-- end modal photo -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

