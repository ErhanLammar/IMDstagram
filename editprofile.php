<?php
/**
 * Created by PhpStorm.
 * User: erhanlammar
 * Date: 16/05/16
 * Time: 07:40
 */
include_once ("classes/Db.class.php");
include_once ("classes/config.class.php");
include_once ("classes/user.class.php");

session_start();
if(!isset($_SESSION['loggedIn'])){
    header("Location:index.php");
}
if(isset($_POST['uploadimg'])){
    move_uploaded_file($_FILES['file']['tmp_name'], "uploade_profileim/".$_FILES['file']['name'] );
}
if(!empty($_POST['update'])) {
// todo: 1 form input velden ophalen
    try {

        $u = new User();
        $u->Username = $_POST['form-username'];
        $u->Email = $_POST['form-emailupdate'];
        $u->Password = $_POST['form-password'];
        $u->Passwordconfirmation = $_POST['form-passwordconf'];
        $u->Update($_SESSION['loggedIn']);
        $succes = "Je profiel is aangepast";
    } catch (exception $e) {
        $succes = $e->getMessage();
    }
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>profielpagina bewerken</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
            <a class="navbar-brand" href="homepage.php">IMDStagram</a>
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
                            <li><a href="uploadbox" data-toggle="modal">Upload foto</a></li>
                            <li><a href="#">Bewerk persoonlijke gegevens</a></li>
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
                </form>
                    <!-- /.navbar-collapse -->
            </div>
        </div>
    </div>
</nav

    <!-- Page Content -->
<div class="container">
    <div class="col-lg-12">
        <h1 class="page-header"> <?php  echo $_SESSION["username"];   ?> bewerk hier je pagina </h1>
    </div>
    <hr>
    <div class="row">
        <!-- left column -->
        <form role="form" action="classes/user.class.php" method="post" enctype="multipart/form-data">
        <div class="col-md-3">
            <div class="form-group">
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "IMDstagram");
                    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '". $_SESSION['loggedIn']."'");
                    while ($row = mysqli_fetch_assoc($query)){
                        if ($row['profileimage'] == "") {
                            echo "<img src='//placeholdit.imgix.net/~text?txtsize=9&txt=100%C3%97100&w=100&h=100' class='avatar img-circle' alt='avatar'>";
                        }else{
                            echo "<img src='uploaded_profileimg/".$row['profileimage']."' class='avatar img-circle' alt='avatar'";
                        }
                    }
                    ?>
                    <h6>Upload een andere profielfoto</h6>
                    <input type="file" name="file" class="form-control">
                </div>
            <div class="form-group">
                <button type="submit" name="uploadimg" class="btn">upload nieuwe profielafbeelding</button>
            </div>
        </div>
        </form>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
                <?php if(isset($succes)) {
                    echo "<p> $succes</p>";
                }
                ?>
            </div>
            <h3>Bewerk je persoonlijke gegevens</h3>

            <div class="form-bottom">
                <form role="form" action="" method="post" class="login-form" >
                    <div class="form-group">
                        <label class="sr-only" for="form-username">Username</label>
                        <input type="text" name="form-username" placeholder="Gebruikersnaam..." class="form-username form-control" id="form-username">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-email">Password</label>
                        <input type="text" name="form-emailupdate" placeholder="email..." class="form-email form-control" id="form-email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input type="password" name="form-password" placeholder="wachtwoord..." class="form-password form-control" id="form-password">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-passwordconf">Password</label>
                        <input type="password" name="form-passwordconf" placeholder="wachtwoord bevestigen..." class="form-passwordconf form-control" id="form-passwordconf">
                    </div>
                    <input type="submit" name="update" class="btn" value="verander gegevens"/>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="navbar-inverse navbar-fixed-bottom">
</footer>
<!-- /.container -->
<div class="modal fade" id="uploadbox" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Upload je foto</h4>
            </div>
            <div class="modal-body">
                <form method="post" >


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
                <form method="post">
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
