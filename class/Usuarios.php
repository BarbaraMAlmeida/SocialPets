<?php
session_start();
   
    require_once "Conexao.php";

    class Usuarios
    {        
        public $ID;
        public $EMAIL;
        public $SENHA;
        
        public function inserirUsuario($email, $senha){
            try{
                $this->EMAIL = $email;
                $this->SENHA = $senha;
                $bd = new Conexao();
                $procurar = $bd->executeSelect("select * from usuarios where email = '{$this->EMAIL}' and senha = '{$this->SENHA}'");
                
                if($procurar == NULL){
                     
                    if(isset($_POST["cadastrar"])){                        
                        $this->EMAIL = $_POST["email"];
                        $this->SENHA = $_POST["senha"];

                        $bd = new Conexao;
                        $comandoInsert =$bd->executeQuery("insert into usuarios(codigo,email,senha) values(Null,'{$this->EMAIL}','{$this->SENHA}')");
                        
                        $_SESSION["token"] = 1;                        
                    }
                }
                else{
                    echo"<script>alert('Essa conta já está em uso! Faça um novo cadastro.')</script>";
                    $_SESSION["token"] = 0;
                }


            }
            catch(PDOExcetion $msg){
                echo "Não foi possível encontrar o usuário".$msg->getMessage();
            }

        }

        public function procurarUsuario($email, $senha){            
            try{
                $this->EMAIL = $email;
                $this->SENHA = $senha;
                $bd = new Conexao();
                $procurar = $bd->executeSelect("select * from usuarios where email = '{$this->EMAIL}' and senha = '{$this->SENHA}'");

                if($procurar == NULL){
                    echo"<script>alert('Usuário e Senha não encontrados! Tente novamente ou crie uma conta')</script>";
                    $_SESSION["token"] = 0;
                }
                else{
                    $_SESSION["token"] = 1;
                }
                
            }
            catch(PDOException $msg){
                echo "Não foi possível efetuar a busca.".$msg->getMessage();
            }
        }


    }
?>