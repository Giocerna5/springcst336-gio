<?php
// http://php.net/manual/en/features.file-upload.multiple.php

if (isset($_POST['uploadForm'])) {

    $file_ary = reArrayFiles($_FILES['fileName']);

    foreach ($file_ary as $file) {
        if ($file["error"] > 0) {
          echo "Error: " . $file["error"] . "<br>";
        }
        else {
          echo "Upload: " . $file["name"] . "<br>";
          echo "Type: " . $file["type"] . "<br>";
          echo "Size: " . ($file["size"] / 1024) . " KB<br>";
          echo "Stored in: " . $file["tmp_name"] . "<br><br>";
        }  
        // print 'File Name: ' . $file['name'];
        // print 'File Type: ' . $file['type'];
        // print 'File Size: ' . $file['size'];
    }

} //endIf form submission
?>