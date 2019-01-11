<form action="Create.php" method="POST">
    <input type="text" name="createDB" placheholde="Need new name for database">
    <input type="submit" name="send">
</form>

<?php

require_once 'DataBase.php';

$pdo = new DataBase();

if(!empty($_POST['createDB'])) {
    $res = $pdo->createDatabase($_POST['createDB']);
    var_dump($res);
}