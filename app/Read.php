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
$users = $pdo->showUsers();

                if(!empty($_GET['users'])) {
                    foreach($users as $k => $v) {
                        echo '<input type="submit" value="' . $v["User"] . '" name="user" class="RbuttonTwo"><br>';
                    }   
                    echo '<hr>';  
                }
                
                if(!empty($_GET['user'])) {

                    $user = '\''.$_GET['user'].'\'@\'localhost\'';

                    $res = $pdo->pdo->query('SHOW GRANTS FOR '.$user);
                    $privileges = $res->fetchAll(PDO::FETCH_ASSOC);

                    echo '<input type="submit" value="' . $_GET['user'] . '" class="RbuttonTwo"><br>';
                    $keyGrants = 'Grants for '.$_GET['user'].'@localhost';


                    echo '<p class="Rtext">' . $privileges[0][$keyGrants] . '</p>';
                    echo '<hr>';
                }
////////////////////////////
////-- VIEW DATABASES --////
////////////////////////////               
            ?>
     
        <input type="submit" name="databases" value="Show Databases" class="Rbutton"><hr>
            <?php

           
$databases = $pdo->showDatabases();

                if(!empty($_GET['databases'])) {
                    foreach($databases as $key => $value) {
                        echo '<input type="submit" class="RbuttonTwo" value="' . $value['Database'] . '" name="database"><br>';
                    }
                    echo '<hr>';
                    
                }

////////////////////////////
////--- VIEW TABLES ----////
////////////////////////////

                if(!empty($_GET['database'])) {
                    $getD = 'Tables_in_'.$_GET['database'];
                    
                    $pdo->useDatabase($_GET['database']);
                    
                    echo '<input type="submit" class="RbuttonTwo" value="Tables: ' . $_GET['database'] . '"><br>';

                    $tables = $pdo->showTables();

                    foreach($tables as $k => $v) {
                        echo '<input type="submit" class="tables RbuttonThree" value="' . $v[$getD] . '" name="table"><br>';
                        
                    }
                }

                if(!empty($_GET['table'])) {
                    $pdo->useDatabase('buh');

                    $table = $pdo->descTable($_GET['table']);
                    echo '<pre>';
                    var_dump($_GET, $table);
                }


            ?>
        
        

    </form>

        <script type="text/javascript" src="/view/js/read.js"></script>
    </body>
</html>
