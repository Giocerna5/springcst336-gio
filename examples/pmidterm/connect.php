<?php
include "./luis.php";

$db = getDBConnection("midterm");

    $query = "select * from mp_product";    
    $statement= $db->prepare($query);
    $statement->execute();
    
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);

?>
