<?php
    require_once "Conexao.php";

    class Abandonados
    {
        public $CODIGO;
        public $RACA;
        public $TELEFONE;
        public $SEXO;
        public $IMAGEM;
        public $DATA_ENCONTRADO;
        public $DESCRICAO;

        public function listarTodos()
        {
            try {
                $bd = new Conexao();

                $listar = $bd->executeSelect("select*from ABANDONADOS order by codigo");


                return $listar;

            } catch (PDOException $msg) {
                echo "Não foi possível deletar os dados".$msg->getMessage();
            }
        }


        public function inserir()
        {
            try {
                if (isset($_POST["salvar"])) {
                    $this->CODIGO = $_POST["codigo"];
                    $this->RACA = $_POST["raca"];
                    $this->TELEFONE = $_POST["telefone"];
                    $this->SEXO = $_POST["sexo"];
                    $this->DATA_ENCONTRADO = $_POST["data_encontrado"];
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
                            $comandoInsert = "insert into abandonados(codigo,raca,telefone,path,nomeimagem,sexo,data_encontrado,descricao)
                            values( {$this->CODIGO}, '{$this->RACA}', '{$this->TELEFONE}','$path','$nomeDoArquivo', '{$this->SEXO}', '{$this->DATA_ENCONTRADO}', '{$this->DESCRICAO}');";

                            return $bd->executeQuery($comandoInsert);
                            echo "<p>Arquivo enviado com sucesso! Para acessá-lo, <a target=\"_blank\" href=\"img/$novoNomeDoArquivo.$extensao\">clique aqui.</a></p>";
                    
                        }else{
                            echo "<p>Falha ao enviar arquivo</p>";
                        }
                    }
                }

                
            } catch (PDOException $msg) {
                echo "Não foi possível inserir os dados.".$msg->getMessage();
            }
        }

        public function buscar($racabusca) {
            try{
                $this->RACA = $racabusca;
                $bd = new Conexao();
                
                $filtrar = $bd->executeSelect("select * from abandonados where RACA = '{$this->RACA}';");

                return $filtrar;
            }
            catch(PDOException $msg){
                echo "Não foi possível efetuar a busca.".$msg->getMessage();
            }
        }

        public function deletar(){
            try{
                if(isset($_GET["codigo"])){
                    $this->CODIGO = $_GET["codigo"];
                    $bd = new Conexao();

                    $comandoDelete = "delete from abandonados where codigo ={$this->CODIGO};";
                    return $bd->executeQuery($comandoDelete);
                }
            }
            catch(PDOException $msg){
                echo "Não foi possível deletar os dados ".msg->getMessage();
            }
        }

        public function listarcodigo ($CODIGO){
            try {
                $this->CODIGO = $CODIGO;

                $bd = new Conexao();
                $sql = "select * from ABANDONADOS where CODIGO = {$this->CODIGO};";

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
                    $this->RACA = $_POST["raca"];
                    $this->TELEFONE = $_POST["telefone"];
                    $this->SEXO = $_POST["sexo"];
                    $this->DATA_ENCONTRADO = $_POST["data_encontrado"];
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
                    $comandoUpdate = "update abandonados set raca = '{$this->RACA}',  telefone = '{$this->TELEFONE}',path = '$path', nomeimagem ='$nomeDoArquivo', sexo = '{$this->SEXO}', data_encontrado = '{$this->DATA_ENCONTRADO}', descricao = '{$this->DESCRICAO}' where codigo = {$this->CODIGO};";
                    return $bd->executeQuery($comandoUpdate);
                    
                }
            }catch(PDOException $msg){
                echo "Não foi possível atualizar os dados do animal abandonado: ".$msg->getMessage();
            }
        }


    }

?>