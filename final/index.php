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
        <table style="width:110%" align="center"id="data">
            <tr>
                <td>Date</td>
                <td>Start Time(Military Time)</td>
                <td>Duration</td>
                <td>Booked By</td>
                <td><button onclick="document.getElementById('id01').style.display='block'" class="w3-button">Add</button></td>
            </tr>
            
                
            </table>
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
         func2();
        
           function func(){ // Declare a function
            var date = $('#date').val()
            var start = $('#start').val();
            var end = $('#end').val();
            var duration = diff(start, end).toString();
            var temp = parseInt(duration); 
            //console.log(temp);
            if(temp > 12){
                temp-12;
            var temp2 = temp.toString();
            
            duration.replace(0, "0");
            duration.replace(1,"temp2")
            }
            
            console.log(duration);
            
             $.ajax({
                type:"POST",
                url: "./timeAdd.php",
                data: {
                    "date" : date,
                    "start" : start,
                    "duration" : duration
                }, 
                success: function(data, status) {
                 //console.log(date + " " + start + " " + duration)
                
                 location.reload();
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                },
            });
            
            
            }
           
           function func2()
           {
            $.ajax({
                type:"GET",
                url: "getInfo.php",
                dataType: "json",
                data: {},
                success: function(data, status) {
                    for(var i = 0; i < data.length; i++)
                    {
                        $('#data').append(
                            "<tr> \n<td id = 'bang'> " + data[i].date + " </td>"
                            +"\n<td> " + data[i].start + " </td>"
                            +"\n<td> " + data[i].duration + " hours</td>"
                            +"\n<td> " + data[i].author + " </td>"
                            + "<td><input type='button' onclick= '' value='Details'/></td> \n<td><input type='button' onclick= '' value='Delete'/></td><tr>"
                            )
                    }
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                    console.log(arguments);
                },
         
            });
               
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
            if (hours < 0)
               hours = hours + 24;
        
            return (hours <= 9 ? "0" : "") + hours + ":" + (minutes <= 9 ? "0" : "") + minutes;
        }
        
        </script>
        
        
    </body>
</html>



