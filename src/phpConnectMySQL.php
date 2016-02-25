<?php

  //1. verbinding maken met DB
  $mysqli = new mysqli('127.0.0.1', 'root', 'usbw', 'portfolio', '3307');
                        //2. verbinding controleren
  if ($mysqli->connect_error) {
    die('Kan niet verbinden met de DB: ' . $mysqli->connect_error);
  }




function checkUserCredentials($username, $password){

    global $mysqli;
    global $errorMsg;

    //username & password are filled in
    //clean up
    $username = stripslashes($username);
    $username = mysql_real_escape_string($username);
    $password = stripslashes($password);
    $password = mysql_real_escape_string($password);
    //$password = md5($password);

  //3. statement preparen
  $stmt = $mysqli->prepare('SELECT * FROM users WHERE username=? AND password=?');
  if($stmt->error){
    die('Statement kon niet geprepared worden: '.$stmt->error);
  }

  //4. paramaters binden
  $stmt->bind_param('ss', $username, $password);

  if($stmt->error){
    die('Parameters konden niet gebind worden: ' .$stmt->error);
  }

  //5. statement uitvoeren
  $stmt->execute();

  //6. check if 1 row was found
  $stmt->store_result();

  if($stmt->num_rows === 1){
    //echo "User found!";

    //user found in DB
    //check if default password has changed
    $stmt->bind_result($id,$username, $password,$hasPasswordChanged) ; 
    $res = $stmt->fetch() ; 

    if($res){
      //check if user changed default password
      if($hasPasswordChanged === 0){
        //user didn't change default password
        $errorMsg = "Need to change default pwd!";
        $_SESSION['username'] = $username;
        return "changePwd";
        //header("Location: changepwd.php");
      }  else{
        //user already changed default password
        $errorMsg = "Go to reports!";

        $_SESSION['username'] = $username;
        return "reports";
        //header("Location: internship.php");
      }
    } else {
      $errorMsg = "Something went wrong. Check your credentials and try again.";
      return "login";
    }

       
        $stmt->free_result();
    
  } else {
    //echo "No user found!";
    $errorMsg = "No user found. Check your credentials and try again.";
    return "login";
  }

  //9. alles sluiten
  $stmt->close();
  $mysqli->close();

}


function updateUserCredentials($username, $password){
    global $mysqli;
    global $errorMsg;

    //username & password are filled in
    //clean up
    $username = stripslashes($username);
    $username = mysql_real_escape_string($username);
    $password = stripslashes($password);
    $password = mysql_real_escape_string($password);

    //$password = md5($password);


  //3. statement preparen
  $stmt = $mysqli->prepare('UPDATE users SET password =?, hasPasswordChanged=true WHERE username=?');
  if($stmt->error){
    die('Statement kon niet geprepared worden: '.$stmt->error);
  }

  //4. paramaters binden
  $stmt->bind_param('ss', $password, $username);
  

  if($stmt->error){
    die('Parameters konden niet gebind worden: ' .$stmt->error);
  }

  //5. statement uitvoeren
  $stmt->execute();

  //6. check if 1 row was updated
  

  if($stmt->affected_rows >= 0){
        //user changed default password
        $_SESSION['username'] = $username;
        $stmt->free_result();

        $errorMsg = "user changed default pwd!";

        return 'reports';

        //header("Location: reports.php");
  } else {
        //user didn't change default password
        $errorMsg = "user didn't changed default pwd!";


        $_SESSION['username'] = $username;
        $stmt->free_result();

        return 'changepwd';
        //header("Location: changepwd.php");
  }
  
  

  //9. alles sluiten
  $stmt->close();
  $mysqli->close();

}


?>