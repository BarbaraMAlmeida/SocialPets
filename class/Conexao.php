<?php

class Conexao
{
    private $server = "localhost";
    private $bd = "SOCIALPETS";
    private $user = "root";
    private $password = "";
    private $conn = "";

    public function __construct()
    {
        try{
            $this->conn = new PDO("mysql:host={$this->server};dbname={$this->bd};charset=utf8;",$this->user,$this->password);

        }catch(PDOException $msg){
            echo "Não foi possível fazer a conexão com o servidor: ".$msg->getMessage();
        }
    }

    public function executeQuery($comando){
        try{
            $sql = $this->conn->prepare($comando);

            $sql->execute();

            if($sql->rowCount() > 0){
                return '1';
            }else{
                return $sql->errorInfo(); //
            }
        }catch(PDOException $msg){
            echo "Não foi possível executar o comando: ".$msg->getMessage();
        }
    }

    public function executeSelect($comando){
        try{
            $sql = $this->conn->prepare($comando);

            $sql->execute();

            if($sql->rowCount() > 0){
                return $sql->fetchAll(PDO::FETCH_CLASS);                
            }
            else if($sql->rowCount() == 0){
                echo"<script>Oops! Os dados não foram encontrados!</script>";
            }
            else if($sql->rowCount() == NULL){
                echo"não existe o usuario";
            }
            else{
                return $sql->errorInfo();
            }

        }catch(PDOException $msg){
            echo "Não foi possível executar o select: ".$msg->getMessage();
        }
    }

}