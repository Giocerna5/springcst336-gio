<?php
    function getConnection($dbname = 'final'){
        $host = "localhost";
        $user = "root";
        $pswrd = "";
        
        if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        
        //creates connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pswrd);
        
        //displays errors
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }
    
//mysql://b12b575575dd93:335f8998@us-cdbr-iron-east-03.cleardb.net/heroku_778b1f350ccf546?reconnect=true
?>