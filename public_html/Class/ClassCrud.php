<?php
include ("{$_SERVER['DOCUMENT_ROOT']}/xampp/GenericDB/public_html/DB/DataBase.php");

class ClassCrud extends DataBase
{
    private $crud;
    private $contador;

    private function preparedStatements($query , $parametros)
    {
        $this->countParametros($parametros);
        $this->crud=$this->connect()->prepare($query);

        if($this->contador > 0){
            for($i=1; $i <= $this->contador; $i++){
                $this->crud->bindValue($i,$parametros[$i-1]);
            }
        }

        $this->crud->execute();
    }

    private function countParametros($parametros)
    {
        $this->contador = count($parametros);
    }

    #Insert
    public function insertDB($tabela , $condicao , $parametros){
        $this->preparedStatements("insert into {$tabela} values ({$condicao})" , $parametros);
        return $this->crud;
    }

    #select
    public function selectDB($campo, $tabela, $condicao, $parametros){
        $this->preparedStatements("select {$campo} from {$tabela} {$condicao}", $parametros);
        return $this->crud;
    }

    #delete
    public function deleteDB($tabela, $condicao, $parametros){
        $this->preparedStatements("delete from {$tabela} where {$condicao}", $parametros);
        return $this->crud;
    }

    #update
    public function updateDB($tabela, $set, $condicao, $parametros){
        $this->preparedStatements("update {$tabela} set {$set} where {$condicao}", $parametros);
        return $this->crud;
    }
}