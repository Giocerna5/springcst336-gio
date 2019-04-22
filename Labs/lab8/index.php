<!DOCTYPE html>
<html>
    <head>
        <title> Images</title>
  
     
    
    </head>
    <body>
        <form onsubmit="run()"><br>
          Image: <input type="text" name="pic" id="pic2">
         <input type="submit" value="Submit">
        </form>
        <div id ="im">
            
        </div>>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script>
    
    

        function run(){
        var info = $('#pic2').val();
        };
        
        $.ajax({
          type: "post",
          url: "https://pixabay.com/api/?key=12231143-803816f45e11303a402582e0f",
          dataType: "json",
          data: {
          },
          success: function(data,status) {
            var info = run();
          /*  for(var i = 0; i < 450; i++)
            {
               // var n =  data.hits[i].tags.includes(info);
               // if(n == true)
                    $("#im").append("<img src='" + data.hits[i].largeImageURL + "' />");
                  
                    
            }*/     
       
        
            console.log(data);
          },
          complete: function(data,status) { //optional, used for debugging purposes
           // console.log(status);
          }        
                
        }); 
        
    
    </script>

    </body>
</html>