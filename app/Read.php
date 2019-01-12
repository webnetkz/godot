<?php

$users = $pdo->showUsers();
$databases = $pdo->showDatabases();









echo '<pre>';
//var_dump($table_);
echo '</pre>';
?>

<nav>
<button id="navUsers">Users</button>
    <div id="users" style="display: none;">
        <?php
        
            foreach($users as $key => $val) {
                echo '<button>' . $val['User'] . '</button><br>';
            }

        ?>
    </div>
<hr>
<button id="navDatabases">Databases</button>
    <div id="databases" style="display: none;">
        <?php
            foreach($databases as $key => $val) {
                echo '<button>' . $val['Database'] . '</button><br>';
                $d = $val['Database'];
                
                if($d) {
                    $pdo->useDatabase($d);
                    $t = $pdo->showTable();
                    
                    $tableName = 'Tables_in_'.$val['Database'];

                    foreach($t as $key => $val) {
                        echo '<button>' . $val[$tableName] . '</button>';
                    }
                }     
            }

        ?>
    </div>
<hr>
</nav>

<script src="../view/js/read.js"></script>