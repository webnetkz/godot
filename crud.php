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

    <form id="menuForm" action="crud.php" method="GET">
        <nav class="menu">
            <button name="menu" type="submit" value="1" class="menuButton first">Create</button>
            <button name="menu" type="submit" value="2" class="menuButton">Read</button>
            <button name="menu" type="submit" value="3" class="menuButton">Update</button>
            <button name="menu" type="submit" value="4" class="menuButton last">Delete</button>
        </nav>
    </form>
        <script type="text/javascript" src="/view/js/crud.js"></script>
        <script type="text/javascript" src="/view/js/ajaxCrud.js"></script>
    </body>
</html>

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

if(!empty($_GET)) {

    $button = $_GET['menu'];

    if($button[0] == 1) {
        require_once 'app/Create.php';

    }
    
    if($button[0] == 2) {
        require_once 'app/Read.php';
    }

    if($button[0] == 3) {
        require_once 'app/Update.php';
    }

    if($button[0] == 4) {
        require_once 'app/Delete.php';
    }
}

?>

