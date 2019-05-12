<?php
    session_start();
    require_once "config.php";
       if(!isset($_SESSION['access_token'])){
        header('Location: login.php');
    }

    $loginURL = $gClient->createAuthUrl();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboards</title>
                <link rel="stylesheet" href="styles/main.css" type="text/css" />
                <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
        <header>
            <div id="log">
                <a href="logout.php" class="log1 removeLinkDecor"><div>Logout</div></a>
             </div>
            
        </header>
    </head>
    <body>
         
        <br><br> <br><br> <br><br> 
        <table style="width:70%" align="center"id="data">
            <tr>
                <td>Date</td>
                <td>Start Time</td>
                <td>Duration</td>
                <td>Booked By</td>
                <td><input type="button" onclick= "" value="Add"/></td>
            </tr>
             <tr>
                <td>5/1/2018</td>
                <td>9 AM</td>
                <td>1 hours</td>
                <td>Not booked</td>
                <td><input type="button" onclick= "" value="Details"/></td>
                <td><input type="button" onclick= "" value="Delete"/></td>
            </tr>
        </table>
        
        
    </body>
</html>