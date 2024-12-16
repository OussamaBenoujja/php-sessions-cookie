<?php

session_start();

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();

    //clear cookies
    setcookie('auth_token','',time()- 3600,'/');

    //redirect to login 
    header('Location: index.php');
    exit;

}else if(isset($_SESSION['username']) && isset($_COOKIE['auth_token'])){
    header('Location: home.php');
    exit;
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $valid_username = 'admin';
    $valid_password = 'osama123';

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if($username===$valid_username && $password===$valid_password){

        $_SESSION['username'] = $username;
        
        setcookie("auth_token",md5($username . $valid_password),time() + 3600,"/");
        
        header("Location: home.php");

        exit;

    }else{
        $error_message = "Invalidd username or password.";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>

    <form method="POST" action="index.php">
    <label for="username">Username</label>
    <input type='text' name='username' id='username' required>
    <label for="password">Password</label>
    <input type='password' name='password' id='password' required>
    <button type='submit'>Login</button>

</form>

</body>
</html>
