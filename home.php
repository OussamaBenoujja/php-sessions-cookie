<?php 

session_start();


if(!isset($_SESSION['username']) || !isset($_COOKIE['auth_token'])){
    header('Location: index.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    

    <h1>Welcome Mr <?php echo $_SESSION['username']; ?></h1>
    <a href='index.php?logout=true' >LOGOUT</a>

</body>
</html>