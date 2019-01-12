<?php

$users = $pdo->showUsers();
$databases = $pdo->showDatabases();
//$tables = $pdo->showTable();


//var_dump();
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
            }
        ?>
    </div>
<hr>
</nav>

<script src="../view/js/read.js"></script>