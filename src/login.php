<?php
    require('phpConnectMySQL.php');

    session_start();

    $username = null;
    $password = null;

    $errorMsg = "";
    $isValid = false;

    if(isset($_POST['btnLogin'])){
        if(!isset($_POST['txtUsername']) || empty($_POST['txtUsername'])){
            $errorMsg = "Username required.";

        } else {
            $username = $_POST['txtUsername'];

            if(!isset($_POST['txtPassword']) || empty($_POST['txtPassword'])){
                        $errorMsg = $errorMsg . "Password required.";
                    } else {
                                $password = $_POST['txtPassword'];
                                $isValid = true;
                    }
        }

        if($isValid){
            checkUserCredentials($username, $password);           
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Frederic Gryspeerdt</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CSS-->
    <link rel="stylesheet" href="css/vendor/normalize.css">
    <!--<link rel="stylesheet" href="css/vendor/pure.css">-->
    <link rel="stylesheet" href="css/horizontal_menu.css">


    <!-- Bootstrap Core CSS -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/vendor/stylish-portfolio.css" rel="stylesheet">
    <!-- Custom fonts -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
          rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Navigation -->

<link href='http://fonts.googleapis.com/css?family=Montserrat|Cardo' rel='stylesheet' type='text/css'>

<header class="main_h">

    <!--<div class="row">-->
    <div class="row_menu">
        <a class="logo" href="#">F/G</a>

        <div class="mobile-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav>
            <ul>
                <li><a href="./#about">About</a></li>
                <li><a href="./#portfolio">Portfolio</a></li>
                <li><a href="./#cv">Curriculum Vitae</a></li>
                <li><a href="internship.php" target="_blank">Internship</a></li>
                <li><a href="http://student.howest.be/frederic.gryspeerdt/fredericgryspeerdt/blog/"
                       target="_blank">Blog</a></li>
                <li><a href="#contact">Contact</a></li>

            </ul>
        </nav>

    </div>
    <!-- / row -->

</header>

<div class="hero">

    <h1><span>Frederic Gryspeerdt</span><br>Internship UWC</h1>

    <div class="mouse">
        <span></span>
    </div>

</div>

<!-- Add your site or application content here -->
<!-- About -->
<section id="internship" class="about sec01">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>A developer abroad</h2>

                <p class="lead">NMCT internship at the University of the Western Cape</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis dui orci. Integer tempor felis non enim vestibulum, quis finibus lorem aliquam. Phasellus non nisi pretium nunc finibus posuere. Quisque finibus malesuada dolor, ac tristique tortor feugiat sed. Donec elementum, nunc ac varius mollis, lorem libero faucibus justo, gravida vulputate enim ipsum nec mauris. Etiam ac elementum nibh, eget pharetra dui. Nulla convallis, mauris sit amet blandit aliquet, dolor sem rhoncus urna, faucibus bibendum diam urna quis dui. Phasellus odio neque, volutpat in mattis quis, tincidunt ac est. Vivamus rutrum orci vitae lobortis rhoncus. Mauris ornare mollis enim. Quisque auctor consectetur ullamcorper. Nullam pulvinar rutrum enim. Duis purus lorem, sodales ac sagittis at, vehicula eget nulla.</p>

                <p>Vestibulum sit amet velit quam. Suspendisse vel neque tellus. In efficitur ex eu urna porttitor, nec sagittis sapien dictum. Integer finibus porta velit, in varius mauris scelerisque et. Nullam dignissim neque in eleifend dapibus. Aliquam lobortis lacinia purus, vitae ornare turpis. Nunc egestas massa sit amet pharetra viverra. Sed eu est sed neque vestibulum condimentum eu in est. Pellentesque eu libero a quam tincidunt interdum. Curabitur at tortor condimentum, condimentum leo ac, tincidunt elit. Cras pretium ac enim quis scelerisque. Etiam maximus erat at arcu aliquet semper. Ut mollis cursus sapien a convallis. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<!-- Login weekly reports -->
<section id="login" class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h2>Login</h2>
                <hr class="small">
                <p class="lead">You need to log in to see my weekly reports</p>

                <div class="row">
                    <form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="username">Username</label>

                                <div class="col-md-4">
                                    <input id="username" name="txtUsername" type="text" placeholder="firstname.surname"
                                           class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password">Password</label>

                                <div class="col-md-4">
                                    <input id="password" name="txtPassword" type="password" placeholder="password"
                                           class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="btnLogin"></label>

                                <div class="col-md-4">
                                    <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-primary">Login</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

 <!-- Map -->
    <section id="contact" class="map">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBfJhD8tMdHUkh6pfqFuNfV1x1v1scEib8&q=CoLab+University+of+the+western+cape,Cape+Town"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small>
        </iframe>
    </section>


<!-- Footer -->
<footer>
    <div class="container" id="contact">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h4><strong>Frederic Gryspeerdt</strong>
                </h4>

                <p>Localhost<br>Roeselare, Belgium</p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-envelope-o fa-fw"></i>frederic.gryspeerdt[at]gmail.com
                    </li>
                </ul>
                <br>
                <ul class="list-inline">
                    <li>
                        <a href="https://github.com/FredericGryspeerdt"><i class="fa fa-github fa-fw fa-3x"></i></a>
                    </li>
                    <li>
                        <a href="https://be.linkedin.com/in/frederic-gryspeerdt-584293b5"><i
                                class="fa fa-linkedin fa-fw fa-3x"></i></a>
                    </li>
                </ul>
                <hr class="small">
                <p class="text-muted">Copyright © Frederic Gryspeerdt 2016</p>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="js/vendor/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/vendor/bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/horizontal_menu.js"></script>
</body>
</html>
