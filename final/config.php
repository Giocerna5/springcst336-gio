<?php 
    
    session_start();
    require_once "GoogleApi/vendor/autoload.php";
    $gClient = new Google_Client();
    
    $gClient->setClientId("611897826857-5q2jb9866mo128njke4hurgn6vm7qiss.apps.googleusercontent.com");
    $gClient->setClientSecret("oYdPqHIwcswYO5jgOuAmdty2");
    $gClient->setApplicationName("User login");
     $gClient->setRedirectUri("https://springcst336-gio-giocerna.c9users.io/w/final/g-callback.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
    

?>