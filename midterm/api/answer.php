<?php 

    include '../dbConnection.php';
    
    $conn = getDatabaseConnection("cinder");
    
    $sql = "SELECT * FROM answer_type_id";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>