<?php

    
class DataBase {
    
    public $pdo;

    public $driver = 'mysql';
    public $host = 'localhost';
    public $dbname = 'mysql';
    public $charset = 'utf8';
    public $port = 3306;
    public $login;  
    public $pass;
    public $option = [
        
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Error mod
        PDO::ATTR_PERSISTENT => true // Continuous connect 

    ];

     // Autoload connect
    public function __construct() {

        /*try {
            $this->pdo = new PDO(

                $this->driver .
                ':host=' . $this->host .
                ';dbname=' . $this->dbname .
                ';charset=' . $this->charset .
                ';port=' . $this->port,
                $this->login,
                $this->pass,
                $this->option

            );
        } catch(PDOException $e) {
            exit($e->getMessage());
        }*/
    }

     // Connect to external database
    public function ConnectDataBase($login, $pass) {

        $this->login = $login;
        $this->pass = $pass;

        try {
            $this->pdo = new PDO(

                $this->driver .
                ':host=' . $this->host .
                ';dbname=' . $this->dbname .
                ';charset=' . $this->charset .
                ';port=' . $this->port,
                $this->login,
                $this->pass,
                $this->option

            );
        } catch(PDOException $e) {
            exit($e->getMessage());
            return $this->pdo;
        }
    }

// Users
     // Create User
    public function createUser($name, $pass) {

        $sql = "CREATE USER '$name'@'localhost' IDENTIFIED BY '$pass'";
        $sqlPrivileges = "GRANT ALL PRIVILEGES ON * . * TO '$name'@'localhost'";
        $sqlFlush = 'FLUSH PRIVILEGES';

        $this->pdo->query($sql);
        $this->pdo->query($sqlPrivileges);
        $this->pdo->query($sqlFlush);
        
        
    } 

     // Show Users
    public function showUsers() {
        $this->useDatabase('mysql');
        $sql = 'SELECT User FROM user WHERE User != \'mysql.sys\' AND User != \'mysql.session\' AND User != \'debian-sys-maint\';';
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

     // Change Password
    public function setPassword($name, $pass) {

        $sql = "SET PASSWORD FOR '$name'@'localhost' = PASSWORD('$pass');";
        $this->pdo->exec($sql);
    }

     // Delete User
    public function dropUser($name) {

        $sql = "DROP USER '$name'@'localhost'";
        $this->pdo->exec($sql);
    }

// Databases
     //Create Database
    public function createDatabase($name) {

        $sql = "CREATE DATABASE IF NOT EXISTS $name CHARACTER SET utf8 COLLATE utf8_general_ci;";
        $result = $this->pdo->query($sql);    
        if($result) {
            return $result;
        }
    }

     // Use Database
    public function useDatabase($name){
        $sql = "USE $name";
        $this->pdo->query($sql);
    }

     // Show Database
    public function showDatabases() {

        $sql = "SHOW DATABASES;";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

     // Delete Database
    public function deleteDatabase($name) {

        $sql = "DROP DATABASE IF EXISTS `$name`;";
        $this->pdo->exec($sql);
    }
// Tables
     // Create Table
    public function createTable($name) {

        $sql = "CREATE TABLE IF NOT EXISTS `$name` (id INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY(id));";
        $this->pdo->exec($sql);
    }

     // Show Tables
    public function showTables() {

        $sql = "SHOW TABLES;";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

     // Desc Table
    public function descTable($name) {

        $sql = "DESC $name";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

     // Show Table
    public function showTable($name) {

        $sql = "SELECT * FROM $name";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

     // Rename Table
    public function renameTable($name, $newname) {

        $sql = "ALTER TABLE $name RENAME $newname;";
        $result = $this->pdo->exec($sql);
    }

      // Delete Table 
          public function deleteTable($name) {

        $sql = "DROP TABLE IF EXISTS $name;";
        $result = $this->pdo->exec($sql);
    }
// Columns
     // Append column
    public function addColumn($table, $name, $type) {

        $sql = "ALTER TABLE $table ADD $name $type NOT NULL;";
        $result = $this->pdo->exec($sql);
    }

     // Delete column
    public function deleteColumn($table, $name) {

        $sql = "ALTER TABLE $table DROP $name;";
        $result = $this->pdo->exec($sql);
    }

// Rows
     // Append line
     public function addRow($table, $where, $row, $type) {

        $sql = "INSERT INTO $table($where) VALUES($row $type NOT NULL);";
        $result = $this->pdo->exec($sql);
     }

}