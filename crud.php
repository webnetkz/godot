<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

if(!$_SESSION['login']) {
    header('Location: index.php');
}

require_once 'app/DataBase.php';

$pdo = new DataBase();
$pdo->connectDatabase($_SESSION['login'], $_SESSION['pass']);


?>

<!DOCTYPE html>
<html lang="ru en">
    <head>
        <title>CRUD</title>

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
            <a href="app/Create.php"><button class="menuButton first">Create</button></a>
            <a href="app/Read.php"><button class="menuButton">Read</button></a>
            <a href="app/Update.php"><button class="menuButton">Update</button></a>
            <a href="app/Delete.php"><button class="menuButton last">Delete</button></a>
        </nav>
    </div>
    <h2 class="crud">Weclome <span class="name"><?php echo $_SESSION['login'];?></span> to CRUD</h2>

        <script type="text/javascript" src="/view/js/crud.js"></script>
        <script type="text/javascript" src="/view/js/ajaxCrud.js"></script>
    </body>
</html>



