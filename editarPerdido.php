<?php
header("Content-type: text/html; charset=utf8");
require_once "class/Perdidos.php";
$Perdidos = new Perdidos;

if(isset($_GET["codigo"])){
    $dadosPerdidos = $Perdidos->listarcodigo($_GET["codigo"]);
}

if(isset($_POST["salvar"])){
    $result = $Perdidos->atualizar();
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
            <h1>Alterar Pet's Perdidos</h1>
        </section>

        <section class="formsAll">

        <form class="row g-3 needs-validation was-validated"  novalidate id="formcadastro" action='editarPerdido.php' method='POST' enctype="multipart/form-data">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Codigo</label>
                <input type="number" class="form-control" id="validationCustom01" name="codigo" value="<?php echo $dadosPerdidos[0]->CODIGO; ?>" class="form-control" readonly>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Nome</label>
                <input type="text" class="form-control" id="validationCustom02" name="nome" value="<?php echo $dadosPerdidos[0]->NOME; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Raça</label>
                <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationCustomUsername" name="raca" value="<?php echo $dadosPerdidos[0]->RACA; ?>"  aria-describedby="inputGroupPrepend" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Dono</label>
                <input type="text" class="form-control" id="validationCustom03" name="dono" value="<?php echo $dadosPerdidos[0]->DONO; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustom05" name="email_dono" value="<?php echo $dadosPerdidos[0]->EMAIL_DONO; ?>" required>
            </div>

            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Telefone</label>
                <div class="input-group has-validation">
                <input type="text" class="form-control" id="validationCustomUsername" name="telefone" value="<?php echo $dadosPerdidos[0]->TELEFONE; ?>" aria-describedby="inputGroupPrepend" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Sexo</label>
                <select class="form-select" id="validationCustom04" name="sexo" required>
                <option selected disabled value=""></option>
                <option value="M"<?php if($dadosPerdidos[0]->SEXO == 'M'){ echo 'selected'; } ?>>Macho</option>
                <option value="F" <?php if($dadosPerdidos[0]->SEXO == 'F'){ echo 'selected'; } ?>>Fêmea</option>
                <option value='O' <?php if($dadosPerdidos[0]->SEXO == 'O'){ echo 'selected'; } ?>>Outro</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="validationCustom05" class="form-label">Data da perda</label>
                <input type="date" class="form-control" id="validationCustom05" name="data_perda" value="<?php echo $dadosPerdidos[0]->DATA_PERDA; ?>" required>
            </div>

            <div class="col-md-5 mb-3">
                <label for="validationTextarea" class="form-label">Imagem</label>
                <input type="file" class="form-control" name="arquivo" value="<?php echo $dadosPerdidos[0]->IMAGEM; ?>" aria-label="file example" required>
            </div>

            <div class="col-md-7 mb-3">
                <label for="validationTextarea" class="form-label">Descrição</label>
                <input type="text" class="form-control" name="descricao" value="<?php echo $dadosPerdidos[0]->DESCRICAO; ?>" aria-label="file example" required>
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