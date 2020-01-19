<?php

abstract class DataBase
{

    protected function connect(){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=crud","root","");
            return $conn;
        }catch (PDOException $erro){
            return $erro->getMessage();
        }
    }

}