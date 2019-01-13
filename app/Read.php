<?php

$users = $pdo->showUsers();
$databases = $pdo->showDatabases();


echo '<pre>';
//var_dump($table_);
echo '</pre>';
?>

<nav>
<button id="navUsers" class="btnReadOne">Users</button>
    <div id="users" style="display: none;">
        <?php
            foreach($users as $key => $val) {
                echo '<button class="btnReadTwo">' . $val['User'] . '</button>';
            }
        ?>
    </div>
<hr>
<button id="navDatabases" class="btnReadOne">Databases</button>
    <div id="databases" style="display: none;">
        <?php
            foreach($databases as $key => $val) {
                echo '<button class="btnReadTwo">' . $val['Database'] . '</button>';
                $d = $val['Database'];
                echo '<div style="display: visible">';
                if($d) {
                    $pdo->useDatabase($d);
                    $t = $pdo->showTable();
                    
                    $tableName = 'Tables_in_'.$val['Database'];

                    foreach($t as $key => $val) {
                        echo '<button class="btnReadThree">' . $val[$tableName] . '</button>';
                        //$tab = $pdo->descTable($val[$tableName]);
                        //echo '<pre>';
                        //var_dump($tab);
                    }
                }
                echo '<hr></div>';     
            }

        ?>
    </div>
<hr>
</nav>

<script src="../view/js/read.js"></script>