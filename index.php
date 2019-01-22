<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);



if(!empty($_COOKIE['login'])) {
    header('Location: crud.php');
}

require_once 'app/DataBase.php';

$pdo = new DataBase();

if(!empty($_POST['login']) && !empty($_POST['pass'])) {

    $login = $_POST['login'];
    $pass = $_POST['pass'];
    
    $pdo->ConnectDataBase($login, $pass);

    if($pdo->pdo != null) {
        setcookie("login", $login, time()+60*60*24*30);
        setcookie("pass", $pass, time()+60*60*24*30); 
        header('Location: crud.php');
    }   
}

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Connect width DataBase</title>

        <meta charset="UTF-8">
        <meta name="author" content="TOO "WebNet">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">

        <link rel="shortcut icon" href="/view/img/miniLogo.png" type="image/png">
        <link rel="stylesheet" href="/view/css/style.css">
        <link rel="stylesheet" href="/view/css/mobileStyle.css">
          
    </head>
    <body>

    <form action="index.php" method="POST">
        <input type="text" name="login" placeholder="Login" autocomplete="off">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="send" value="Connect" class="button">
    </form>



        <script type="text/javascript" src="/view/js/main.js"></script>
        <script type="text/javascript" src="/view/js/ajaxMain.js"></script>
    </body>
</html>



