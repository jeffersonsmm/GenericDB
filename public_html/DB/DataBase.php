<?php

abstract class DataBase {

    protected function connect(){
        try {
            $host = 'localhost';
            $db = 'crud';
            $dsn = 'mysql:host=' . $host . ';dbname=' . $db;
            $user = 'root';
            $pwd = '';
            $conn = new PDO($dsn, $user, $pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            return $conn;
        }catch (PDOException $erro){
            return $erro->getMessage();
        }
    }

}