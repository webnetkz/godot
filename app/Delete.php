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


?>

<!DOCTYPE html>
<html lang="ru en">
    <head>
        <title>Create</title>

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

    <form action="Delete.php" method="POST">
    
        <input type="submit" value="Delete User" name="user" class="Rbutton"><hr>

<?php

////////////////////////////
////--- DELETE USERS ---////
////////////////////////////
        
    if(!empty($_POST['user'])) {

        echo '<input type="text" name="nameUser" placeholder="Delete User" autocomplete="off" class="inp"><br>';
        echo '<input type="submit" value="Delete" class="button"><hr>';
    }

        if(!empty($_POST['nameUser'])) {

            $pdo->dropUser($_POST['nameUser']);
            echo '<p class="Rtext">User deleted!</p><hr>';
        }

        ?>    

        <input type="submit" value="Delete Database" name="database" class="Rbutton"><hr>

<?php
        
////////////////////////////
////-- DELETE DATABASE -////
////////////////////////////      

    if(!empty($_POST['database'])) {
                    
        echo '<input type="text" name="nameDatabase" placeholder="Delete Database" autocomplete="off" class="inp"><br>';
        echo '<input type="submit" value="Delete" class="button"><hr>';
    }

        if(!empty($_POST['nameDatabase'])) {
            $pdo->deleteDatabase($_POST['nameDatabase']);
            echo '<p class="Rtext">Database deleted!<p><hr>';
        }

////////////////////////////
////--- DELETE TABLE ---////
////////////////////////////
?>

        <input type="submit" value="Delete Table" name="table" class="Rbutton"><hr>

<?php



    if(!empty($_POST['table'])) {
                        
        echo '<input type="text" name="nameTable" placeholder="Delete Table" autocomplete="off" class="inp"><br>';
        echo '<input type="text" name="base" placeholder="For Database" autocomplete="off" class="inp"><br>';
        echo '<input type="submit" value="Create" class="button"><hr>';
    }

        if(!empty($_POST['nameTable'])) {

            $pdo->useDatabase($_POST['base']);

            $pdo->deleteTable($_POST['nameTable']);
            echo '<p class="Rtext">Table deleted!</p><hr>';
        }

?>
        
    </form>


        <script type="text/javascript" src="/view/js/delete.js"></script>
    </body>
</html>