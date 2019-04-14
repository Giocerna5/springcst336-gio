<!DOCTYPE html>
<html>
    <head>
        <title>Match @ Cinder </title>
        <link href="css/styles.css" rel="stylesheet" type = "text/css"/>
         <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
        var list = [];
            $(document).ready(function(){
               $.ajax({
                type:"GET",
                url: "api/user.php",
                dataType: "json",
                data: {},
                success: function(data, status) {
                    //console.log(data[0]['username']);
                    var i = Math.floor((Math.random() * 10) + 1);
                  $("#image").append("<img src='" + data[i]['picture_url'] + "' width='200'  align='left' />");
                  $("#name").append("<h2>@" + data[i]['username']+ "</h2>");
                  $("#about").append("<p>" + data[i]['about_me']+ "</p>");
                  
                  for (i = 0; i < list.length; i++) { 
                    $("#m").append(data[list[i]]);
                    }
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                    console.log(arguments);
                },
         
            });
            
            
            $.ajax({
                type:"GET",
                url: "api/answer.php",
                dataType: "json",
                data: {},
                success: function(data, status) {
                     
                    console.log(data);
                     //$("#image").append("<img src='" + data[0]['pitcure_url'] + "' width='200' /> <br />");
                      //$("#image").append("<p>" + data[0]['about_me']+ "</p>");
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                    console.log(arguments);
                },
         
            });
            
             $.ajax({
                type:"GET",
                url: "api/getMatch.php",
                dataType: "json",
                data: {},
                success: function(data, status) {
                  //console.log(data);
                  data.forEach(function(key){
                        if(key['match_user_id'] == 1){
                            list.push(key['user_id']);
                        }
                                        
                    }); 
                },
                error: function(err) {
                    console.log("Houston, we have a problem!")
                    console.log(arguments);
                },
         
            });
       
       
       
            });
            
        </script>
    
    
    
    </head>
    <body>
    <center><h1>Match</h1></center>
    <div id="container">
        <div align="center">
        <a href="index.php"> <underline>Home</underline></a>
            |
        <a href="history.html"> <underline>History</underline></a>
        </div>
            <div id = "image"></div>
            <div id="name"></div>
            <div id = "about"></div>
            <div id="k">
            <br>
            <div id="like"><p><b>Like                                          ?                                      Dislike </b><p></div>
            </div>
        
    </div>
    
        

    <table>
<thead>
<tr>
<th style="text-align:left">#</th>
<th style="text-align:left">Task Description</th>
<th style="text-align:left">Points</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:left">1</td>
<td style="text-align:left">Active potential matches are pulled from MySQL using AJAX and a PHP API endpoint, and provides unmatched users, and is displayed using the specified page design</td>
<td style="text-align:left">40</td>
</tr>
<tr>
<td style="text-align:left">2</td>
<td style="text-align:left">The match history is pulled from MySQL using AJAX and a PHP API endpoint, and provides the data for all matches, whether or not there is history, and is displayed using the specified page design</td>
<td style="text-align:left">40</td>
</tr>
<tr>
<td style="text-align:left">3</td>
<td style="text-align:left">The information modal is popped up with the "About Me" information for the match</td>
<td style="text-align:left">20</td>
</tr>
<tr>
<td style="text-align:left"></td>
<td style="text-align:left">TOTAL</td>
<td style="text-align:left">100</td>
</tr>
<tr>
<td style="text-align:left"></td>
<td style="text-align:left">This rubric is properly included AND UPDATED (BONUS)</td>
<td style="text-align:left">2</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">A separate report that shows the number of matches by category is available from navigation and shows the correct numbers, and is cleanly formatted</td>
<td style="text-align:left">15</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">After all potential matches have been displayed, the buttons are disabled and a message is displayed; once the message has been closed the user is navigated to the history page</td>
<td style="text-align:left">15</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">The relative time is displayed in the history page instead of actual date and time</td>
<td style="text-align:left">10</td>
</tr>
<tr>
<td style="text-align:left">BD</td>
<td style="text-align:left">Users who liked the current user are pulled from MySQL using AJAX and a PHP API endpoint, and are displayed using the specified page design</td>
<td style="text-align:left">15</td>
</tr>
</tbody>
</table>
    </body>
</html>