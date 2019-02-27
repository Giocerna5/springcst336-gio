<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    <?php 
      
        echo $n  . "<br><br>";
        $total = 0;
        for($i=0; $i < 9; $i++)
        {
            $n = rand(1,20 );
            $total+=$n;
            
             echo $n;
            
            if($n%2 === 0)
                echo " Even <br><br>";
            else
                echo " Odd <br><br>";
           
        }
        
        echo "<br><br> Total ".$total;
        echo "<br><br> Average ".$total/9;
        
    ?>

    </body>
</html>