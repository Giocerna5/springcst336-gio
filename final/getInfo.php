<?php 

    include 'getDB.php';
    
    $conn = getConnection('final');
   
     $sql = 'SELECT * FROM schedule';
   
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo $records;
    $records = json_encode($records);
    echo $records;
    
    
?>