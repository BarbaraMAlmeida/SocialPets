<?php

    require_once "Conexao.php";

    class Perdidos
    {
        public $CODIGO;
        public $NOME;
        public $RACA;
        public $DONO;
        public $EMAIL_DONO;
        public $TELEFONE;
        public $SEXO;
        public $IMAGEM;
        public $DATA_PERDA;
        public $DESCRICAO;

        public function listarTodos()
        {
            try {
                $bd = new Conexao();
                $listar = $bd->executeSelect("select*from PERDIDOS order by CODIGO");
                return $listar;
            } catch (PDOException $msg) {
                echo "Não foi possível deletar os dados". $msg->getMessage();
            }
        }

        public function deletar(){
            try{
                if(isset($_GET["codigo"])){
                    $this->CODIGO = $_GET["codigo"];
                    $bd = new Conexao();
                    $comandoDelete = "delete from perdidos where codigo ={$this->CODIGO};";
                    return $bd->executeQuery($comandoDelete);
                }
            }
            catch(PDOException $msg){
                echo "Não foi possível deletar os dados ".$msg->getMessage();
            }
        }

        public function inserir()
        {
            try {
                if (isset($_POST["salvar"])) {                   
                    $this->CODIGO = $_POST["codigo"];
                    $this->NOME = $_POST["nome"];
                    $this->RACA = $_POST["raca"];
                    $this->DONO = $_POST["dono"];
                    $this->EMAIL_DONO = $_POST["email_dono"];
                    $this->TELEFONE = $_POST["telefone"];
                    $this->SEXO = $_POST["sexo"];
                    $this->DATA_PERDA = $_POST["data_perda"];
                    $this->DESCRICAO = $_POST["descricao"]; 

                    if(isset($_FILES['arquivo'])){
                        $arquivo = $_FILES['arquivo'];
                    
                        if($arquivo['error']){
                            die("Falha ao enviar arquivo");
                        }
                        if($arquivo['size'] > 2097152){
                            die("Arquivo muito grande!! Máx: 2MB");
                        }
                    
                        $pasta = "img/";
                        $nomeDoArquivo = $arquivo['name'];
                        $novoNomeDoArquivo = uniqid();
                        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
                    
                        if($extensao != "jpg" && $extensao != 'png'){
                            die("Tipo de arquivo não aceito");
                        }
                    
                        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
                        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
                    
                    
                        if($deu_certo){
                           /* $bd = new Conexao();
                            $listaimagens = $bd->executeQuery("insert into PERDIDOS (nome, path) VALUES('$nomeDoArquivo', '$path')");*/
                            $bd = new Conexao();
                            $comandoInsert = "insert into perdidos(CODIGO,NOME,RACA,DONO,EMAIL_DONO,TELEFONE,PATH, NOMEIMAGEM,SEXO,DATA_PERDA,DESCRICAO)
                            values({$this->CODIGO}, '{$this->NOME}', '{$this->RACA}', '{$this->DONO}', '{$this->EMAIL_DONO}', '{$this->TELEFONE}','$path','$nomeDoArquivo', '{$this->SEXO}', '{$this->DATA_PERDA}', '{$this->DESCRICAO}')";
                            return $bd->executeQuery($comandoInsert);
                            echo "<p>Arquivo enviado com sucesso! Para acessá-lo, <a target=\"_blank\" href=\"img/$novoNomeDoArquivo.$extensao\">clique aqui.</a></p>";
                    
                        }else{
                            echo "<p>Falha ao enviar arquivo</p>";
                        }
                    }
                    
                    $sql_query = $bd->executeSelect("SELECT * FROM imagem");
                }

                
                    
                
            } catch (PDOException $msg) {
                echo "Não foi possível inserir os dados.".$msg->getMessage();
            }
        }

        public function buscar($nomebusca) {
            try{
                $this->NOME = $nomebusca;
                $bd = new Conexao();
                $filtrar = $bd->executeSelect("select * from PERDIDOS where Nome = '{$this->NOME}';");               
                return $filtrar;
            }
            catch(PDOException $msg){
                echo "Não foi possível efetuar a busca.".$msg->getMessage();
            }
        }

        public function listarcodigo ($codigo){
            try {
                $this->CODIGO = $codigo;
                $bd = new Conexao();
                $sql = "select * from PERDIDOS where CODIGO = {$this->CODIGO};";
                return $bd->executeSelect($sql);
            }
            catch (PDOException $msg){
                echo "Erro ao atualizar".$msg->getMessage();
            }
        }
    
        public function atualizar(){
            try{
                if(isset($_POST["salvar"])){
                    $this->CODIGO = $_POST["codigo"];
                    $this->NOME = $_POST["nome"];
                    $this->RACA = $_POST["raca"];
                    $this->DONO = $_POST["dono"];
                    $this->EMAIL_DONO = $_POST["email_dono"];
                    $this->TELEFONE = $_POST["telefone"];
                    $this->SEXO = $_POST["sexo"];
                    $this->DATA_PERDA = $_POST["data_perda"];
                    $this->DESCRICAO = $_POST["descricao"]; 
    
                    if(isset($_FILES['arquivo'])){
                        $arquivo = $_FILES['arquivo'];
                    
                        if($arquivo['error']){
                            die("Falha ao enviar arquivo");
                        }
                        if($arquivo['size'] > 2097152){
                            die("Arquivo muito grande!! Máx: 2MB");
                        }
                    
                        $pasta = "img/";
                        $nomeDoArquivo = $arquivo['name'];
                        $novoNomeDoArquivo = uniqid();
                        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
                    
                        if($extensao != "jpg" && $extensao != 'png'){
                            die("Tipo de arquivo não aceito");
                        }
                    
                        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
                        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
                    }

                    $bd = new Conexao();
                    $comandoUpdate = "update perdidos set NOME = '{$this->NOME}', RACA = '{$this->RACA}', DONO = '{$this->DONO}', EMAIL_DONO = '{$this->EMAIL_DONO}', TELEFONE = '{$this->TELEFONE}', PATH = '$path',NOMEIMAGEM ='$nomeDoArquivo', SEXO = '{$this->SEXO}', DATA_PERDA = '{$this->DATA_PERDA}', DESCRICAO = '{$this->DESCRICAO}' where CODIGO = {$this->CODIGO};";
                    return $bd->executeQuery($comandoUpdate);
                }
            }catch(PDOException $msg){
                echo "Não foi possível atualizar os dados do animal perdido: ".$msg->getMessage();
            }
        }

    }