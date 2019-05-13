<?php
    require_once "config.php";
    
    include "getDB.php";
    
    if(isset($_SESSION['access_token']))
        $gClient->SetAccessToken($_SESSION['access_token']);
    else if(isset($_GET['code'])){
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    }else{
        //relocate
        header('Location: login.php'); 
        exit();

    }
  
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    
   // echo"<pre>"; can be pushed to data base
  //var_dump($userData);
   
        $conn = getConnection('final');
        $_SESSION['email'] = $userData['email'];
        $username =  $_SESSION['email'];
        $sql = "SELECT email FROM User WHERE email=:username";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array (":username" => $username));
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $records;
        $records = json_encode($records);
       // echo $records;
        $check = json_decode($records, true);
        //$usernamecheck = mysql_query($sql, $conn);
       
        if(empty($check)){
            $_SESSION['email'] = $userData['email'];
            $_SESSION['familyName'] = $userData['familyName'];
            $_SESSION['givenName'] = $userData['givenName'];
            
            $name = $_SESSION['givenName'].' '.$_SESSION['familyName'];
            $email =  $_SESSION['email'];
            
            $sql2 ="INSERT INTO User (email, name)" .
            "VALUES (:email, :name)";
            //relocate
            
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute( array (":email" => $email,":name" => $name));
         }
    

    header('Location: index.php'); 
    exit();

?>