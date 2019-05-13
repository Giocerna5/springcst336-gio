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
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <header>
            <div id="log">
                <a href="logout.php" class="log1"><div>Logout</div></a>
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
                <td><button onclick="document.getElementById('id01').style.display='block'" class="w3-button">Add</button></td>
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
        
        
        
        <!-- The Modal -->
        <div id="id01" class="w3-modal">
          <div class="w3-modal-content">
            <div class="w3-container">
              <span onclick="document.getElementById('id01').style.display='none'" 
              class="w3-button w3-display-topright">&times;</span>
                <h3 align="center">Add Time Slot</h3>
                <hr>
                Date <input type="date" id="date" name="date">
                <br>
                Start time: <input type="time" id ="start" name="usr_time">
                <br>
                End time: <input type="time" id ="end" name="usr2_time">
                <br>
                <input type="button" onclick="func()" value="Add"/>
            </div>
          </div>
        </div>
        
        <script>
           function func(){ // Declare a function
            var date = $('#date').val();
            var start = $('#start').val();
            var end = $('#end').val();
            var temp = end - start;
            console.log(temp);
            }
           
           function diff(start, end) {
            start = start.split(":");
            end = end.split(":");
            var startDate = new Date(0, 0, 0, start[0], start[1], 0);
            var endDate = new Date(0, 0, 0, end[0], end[1], 0);
            var diff = endDate.getTime() - startDate.getTime();
            var hours = Math.floor(diff / 1000 / 60 / 60);
            diff -= hours * 1000 * 60 * 60;
            var minutes = Math.floor(diff / 1000 / 60);
        
            // If using time pickers with 24 hours format, add the below line get exact hours
            if (hours < 0)
               hours = hours + 24;
        
            return (hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes;
        }
        
        </script>
        
        
    </body>
</html>



