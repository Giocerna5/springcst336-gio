<?php

include '../dbConnection.php';
$conn = getDatabaseConnection("Hangman");

$entry = $_GET['wordId'];

$sql = "SELECT word, length(word) FROM words WHERE word_id = $entry";



$stmt = $conn -> prepare($sql);  
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); 

echo json_encode($record);

?>





<?php
//Used to check the letter the user inputed in the form, and if the letter is in the word
//Should return an array of booleans as the api
include '../dbConnection.php';

?>