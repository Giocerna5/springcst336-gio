<?php

function getDatabaseConnection($dbname = 'pics'){
    
    $host = 'localhost';
    //$dbname = 'tcp';
    $username = 'giocerna';
    $password = '';
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}


?>