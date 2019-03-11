<?php


session_start();
// Used to display an error message below the form
$errorMessage = '';
$username = '';
$isPostback = 'POST' === $_SERVER['REQUEST_METHOD'];

if ($isPostback) {
    $errorMessage = processForm();
}

function processForm()
{
    global $username;
    $info = array("giocerna","tom831","billy");
    $username = $_POST['username'];
    $passwords = $_POST['password'];

    // Validate the form
    if (empty($username)) {
        return 'Username is required';
    }else if(in_array($username,$info)){
        echo 'Username taken!';   
    }//else if(bind_param($username, $passwords)){
       // return 'Username cannot be similar to password';
    //}
     elseif (2 != count($passwords)) {
        return 'Password and Repeat Password are required';
    } elseif ($passwords[0] != $passwords[1]) {
        return 'Password must match Repeat Password';
    } elseif (empty($passwords[0])) {
        return 'Password cannot be empty';
    }
    else{
        $_SESSION[$username] = $passwords[0];
    }
}

?>