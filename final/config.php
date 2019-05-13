<?php 
    
    session_start();
    require_once "GoogleApi/vendor/autoload.php";
    $gClient = new Google_Client();
    
    $gClient->setClientId("860659160421-ta259f0s6g054khfvu4jp13857o9s1a7.apps.googleusercontent.com");
    $gClient->setClientSecret("JSZUdnEQnRkEtTytt-SHVbAE");
    $gClient->setApplicationName("User login");
     //$gClient->setRedirectUri("https://springcst336-gio-giocerna.c9users.io/w/final/g-callback.php");
     $gClient->setRedirectUri("https://giotest.herokuapp.com/final/g-callback.php");

    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
    

?>