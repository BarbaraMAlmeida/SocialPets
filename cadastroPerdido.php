<?php
header("Content-type:text/html; charset=utf8");
require_once "class/Perdidos.php";
require_once "class/Conexao.php";
$bd = new Conexao();
$Perdidos = new Perdidos();
if(isset($_POST["salvar"])){
    $result = $Perdidos->inserir();

    if($result == '1'){
       header('location:perdidos.php');
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;0,700;1,500&display=swap" rel="stylesheet">

        <script src="https://kit.fontawesome.com/51b316c87d.js" crossorigin="anonymous"></script>

        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/icon.png">
        <title>SocialPet's</title>
    </head>

    <body>
        <header>
            <div id="header-left">
               <a href="index.php"><img src="img/logo.png" alt="SocialPet's"></a> 
            </div>

            <div id="header-right">
                <a href="index.php"><button>Sair</button></a>
            </div>
        </header> 

        <section class="content">
            <h1>Cadastro Pet's Perdidos</h1>
        </section>

        <section class="formsAll">

        <form action='cadastroPerdido.php' method='POST' class="row g-3 needs-validation was-validated" enctype="multipart/form-data"  novalidate id="formcadastro">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Codigo</label>
                <input type="number" class="form-control" id="validationCustom01" name="codigo" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Nome</label>
                <input type="text" class="form-control" id="validationCustom02" name="nome" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Raça</label>
                <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="raca" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Dono</label>
                <input type="text" class="form-control" id="validationCustom03" name="dono" required>
            </div>
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustom05" name="email_dono" required>
            </div>

            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Telefone</label>
                <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="telefone" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Sexo</label>
                <select class="form-select" id="validationCustom04" name="sexo" required>
                <option selected disabled></option>
                <option value="M">Macho</option>
                <option value="F">Fêmea</option>
                <option value='O'>Outro</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="validationCustom05" class="form-label">Data da perda</label>
                <input type="date" class="form-control" id="validationCustom05" name="data_perda" required>
            </div>

            <div class="col-md-5 mb-3">
                <label for="validationTextarea" class="form-label">Imagem</label>
                <input type="file" class="form-control" aria-label="file example" name="arquivo" id="arquivo" required> 
            </div>

            <div class="col-md-7 mb-3">
                <label for="validationTextarea" class="form-label">Descrição</label>
                <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Escreva até 50 caracteres" name='descricao' required></textarea>
            </div>
            <div class="col-md-10">
                <button class="btn btn-primary salvar" type="submit" name="salvar">Salvar</button>
            </div>
            <div class="col-md-2">
               <a href="perdidos.php"><button class="btn voltar" type="button">Voltar</button></a> 
            </div>
        </form>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>