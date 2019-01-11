<?php

$users = $pdo->showUsers();



var_dump($users);
?>

<nav>
    <ul id="users">
        <label for="users">USERS</label>
        <?php
        
            foreach($users as $key => $val) {
                echo '<li>' . $val['User'] . '</li>';
            }

        ?>
    </ul>
</nav>