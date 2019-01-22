<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'DataBase.php';

$pdo = new DataBase();
$pdo->connectDatabase($_COOKIE['login'], $_COOKIE['pass']);

?>

<!DOCTYPE html>
<html lang="ru en">
    <head>
        <title>Update</title>

        <meta charset="UTF-8">
        <meta name="author" content="TOO "WebNet">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">

        <link rel="shortcut icon" href="/view/img/miniLogo.png" type="image/png">
        <link rel="stylesheet" href="/view/css/crudStyle.css">
        <link rel="stylesheet" href="/view/css/crudMobileStyle.css">
        
    </head>
    <body>

    <div id="menu">
        <nav class="menu">
            <a href="Create.php"><button class="menuButton first">Create</button></a>
            <a href="Read.php"><button class="menuButton">Read</button></a>
            <a href="Update.php"><button class="menuButton">Update</button></a>
            <a href="Delete.php"><button class="menuButton last">Delete</button></a>
        </nav>
    </div>



        <script type="text/javascript" src="/view/js/update.js"></script>
    </body>
</html>










