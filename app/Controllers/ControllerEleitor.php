<?php

require_once('app/Database/ConexaoDB.php');

class ControllerEleitor
{
    public function createEleitor(Eleitor $eleitor){
        try{
            $insertEleitor = "INSERT INTO eleitor (nome, cpf, idade, voto) VALUES (:nome, :cpf, :idade, :voto)";
            $stmt = ConexaoDB::getConn()->prepare($insertEleitor);
            $stmt->bindValue(':nome', $eleitor->getNome());
            $stmt->bindValue(':cpf', $eleitor->getCpf());
            $stmt->bindValue(':idade', $eleitor->getIdade());
            $stmt->bindValue(':voto', $eleitor->getVoto());
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readEleitor(){
        try{
            $queryEleitor = "SELECT * FROM eleitor";
            $stmt = ConexaoDB::getConn()->prepare($queryEleitor);
            $stmt->execute();

            if($stmt->rowCount()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>