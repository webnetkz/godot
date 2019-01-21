<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

if(!$_SESSION['login']) {
    header('Location: index.php');
}

require_once 'DataBase.php';

$pdo = new DataBase();
$pdo->connectDatabase($_SESSION['login'], $_SESSION['pass']);


$users = $pdo->showUsers();
$databases = $pdo->showDatabases();

?>

<!DOCTYPE html>
<html lang="ru en">
    <head>
        <title>Read</title>

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
    
    <form action="Read.php" method="GET">

        <input type="submit" value="Show Users" name="users" class="Rbutton"><hr>
            <?php

////////////////////////////
////---- VIEW USERS ----////
////////////////////////////

                if(!empty($_GET['users'])) {
                    foreach($users as $k => $v) {
                        echo '<input type="submit" value="' . $v["User"] . '" name="user"><br>';
                    }

                    if(!empty($_GET['user'])) {
                        echo $_GET['user'];
                    }
                echo '<hr>';
                } 
            ?>


        <input type="submit" name="databases" value="Show Databases" class="Rbutton"><hr>
            <?php

////////////////////////////
////-- VIEW DATABASES --////
////////////////////////////            
            
                if(!empty($_GET['databases'])) {
                    foreach($databases as $k => $v) {
                        echo '<input type="submit" class="databases" value="' . $v['Database'] . '" name="database"><br>';
                    }
                    echo '<hr>';
                }
                
////////////////////////////
////--- VIEW TABLES ----////
////////////////////////////

                if(!empty($_GET['database'])) {
                    $getD = 'Tables_in_'.$_GET['database'];
                    
                    $pdo->useDatabase($_GET['database']);
                    $tables = $pdo->showTable();

                    echo 'Tables in ' . $_GET['database'] . ':<br>';
                    foreach($tables as $k => $v) {
                        echo '<input type="submit" class="tables" value="' . $v[$getD] . '" name="tables"><br>';       
                    }
                }
            ?>
        </ul>
        

    </form>

        <script type="text/javascript" src="/view/js/read.js"></script>
    </body>
</html>
