<?php 

    include 'getDB.php';
    
    require_once "config.php";
    
     $conn = getConnection('final');
    
//echo "hello";
    
    if(isset($_SESSION['access_token']))
        $gClient->SetAccessToken($_SESSION['access_token']);
    
    
    
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    
    $_SESSION['familyName'] = $userData['familyName'];
    $_SESSION['givenName'] = $userData['givenName'];
    
    
    $by = $_SESSION['givenName'].' '.$_SESSION['familyName'];
   
    $sql ="INSERT INTO schedule (date, start, duration, author)" .
    "VALUES (:date, :start, :duration, :by)";
    //relocate
    $stmt = $conn->prepare($sql);
   // var_dump( $_POST['date']);
    $stmt->execute( array (":date" => $_POST['date'],":start" => $_POST['start'],":duration" => $_POST['duration'],":by" => $by));
?>
  