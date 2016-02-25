<?php
    require('phpConnectMySQL.php');
    include('auth.php');

    $username = null;
    $password = null;

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        echo $username;
    }

    $errorMsg = "";
    $isValid = false;

    if(!isset($_POST['txtPassword']) || empty($_POST['txtPassword'])){
            $errorMsg = $errorMsg . "Password required.";
    } else {
         $password = $_POST['txtPassword'];
         //echo $password;
         $isValid = true;
    }
    

    if($isValid){
        updateUserCredentials($username, $password);           
    }
    


    
?>


<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="Frederic Gryspeerdt portfolio website">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!--CSS-->
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="css/vendor/normalize.css">
        <!--<link rel="stylesheet" href="css/vendor/pure.css">-->

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
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<div class="content-head is-center">
    <div class="pure-g">
        <div class="pure-u-1-3">
          <p><?php print($errorMsg); ?></p>
        </div>
        <div class="pure-u-1-3">
            <form class="pure-form pure-form-stacked" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <fieldset>
                    <legend>Change password</legend>

                    <label for="password">Password</label>
                    <input id="password" type="password" placeholder="New password" name="txtPassword">

                    <button type="submit" class="pure-button pure-button-primary" name="btnChangePwd" value="send">Submit</button>
                </fieldset>
            </form>
        </div>
        <div class="pure-u-1-3"></div>


    </div>
</div>



<!-- jQuery -->
<script src="js/vendor/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/vendor/bootstrap.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/menu.js"></script>

</body>
</html>
