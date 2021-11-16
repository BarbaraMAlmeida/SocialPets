<?php
header("Content-type:text/html; charset=utf8");
require_once "class/Perdidos.php";
require_once "class/Usuarios.php";


if($_SESSION['token'] == 1){
    $perdidos = new Perdidos();
    if(isset($_POST["filtrar"]) && !empty($_POST["nomebusca"])){
        $listaPerdidos = $perdidos->buscar($_POST["nomebusca"]);
    }
    else{  
        $listaPerdidos = $perdidos->listarTodos();
        
    }
    if(isset($_GET["codigo"]) && !empty($_GET["codigo"])){
        $result = $perdidos->deletar();

        if($result == "1"){
            header("location:perdidos.php");
        }
    }
}
else{
    header("location:login.php");
}

if(isset($_POST["sair"])){

    $_SESSION['token'] = 0;
    header("location:index.php");
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
                <ul>
                    <li class='underline'><a href="perdidos.php">Perdidos</a></li>
                    <li class='underline'><a href="abandonados.php">Abandonados</a></li>
                    <li>
                        <form action="abandonados.php" method="POST">
                            <button type="submit" name="sair">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>

            <div class="hamburguer">
                <i class="fas fa-bars"></i>
            </div>
        </header> 

        <div class="menuDown">
            <ul>
                <li class='underline'><a href="perdidos.php">Perdidos</a></li>
                <li class='underline'><a href="abandonados.php">Abandonados</a></li>

                <li><a href="index.php"><button>Sair</button></a></li>
            </ul>
        </div>

        <section class="content">
            <h1>Pet's Perdidos</h1>
            <div id="proceduresDown">
                <form action="perdidos.php" method='POST' class="filterForm">
                    <div id="filter">
                        <p>Filtre por:</p> 
                        <input type="text" placeholder="Digite o nome" name='nomebusca'>
                        <button type='submit' name='filtrar'>Filtrar</button>
                    </div>
                </form>
                <p>Ou</p>
                <a href="cadastroPerdido.php"><button class='add'>Cadastre Pet's</button></a>
            </div>

            <div class="cards">
                <?php
                if($listaPerdidos == NULL){
                    echo"sem dados cadastrados";
                }else{
                 foreach($listaPerdidos as $perdido){ ?>
                    <div class="card-item">
                        <img src="<?php echo $perdido->PATH;?>" alt="Identificação">
                        <div class="textCard" >
                            <p>CODIGO: <?php echo $perdido->CODIGO; ?></p>   
                            <p>Nome: <?php echo $perdido->NOME; ?></p>
                            <p>Raça:  <?php echo $perdido->RACA; ?></p>
                            <p>Dono: <?php echo $perdido->DONO; ?></p>
                            <p>Email dono: <?php echo $perdido->EMAIL_DONO; ?></p>
                            <p>Telefone:  <?php echo $perdido->TELEFONE; ?></p>
                            <p>Sexo:  <?php echo $perdido->SEXO; ?></p>
                            <p>Data perda:  <?php echo $perdido->DATA_PERDA;?></p>
                            <p>Descrição:  <?php echo $perdido->DESCRICAO;?></p>
                        </div>
                        <div class="buttoncard">
                            <button class="found">Encontrei</button>

                            <div class='iconsProcedures'>
                            <a href="editarPerdido.php?codigo=<?php echo $perdido->CODIGO;?>"><i class="fas fa-edit"></i></a>
                            <a href="perdidos.php?codigo=<?php echo $perdido->CODIGO;?>"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
                
            </div>
        </section>
        
        <!--- Modal Found ---->
        <section class="modal find">
            <div class="modalsection">
                <i class="far fa-times-circle closeModal"></i>
                <h1>Oops! Temos um problema</h1>
                <img src="img/error.png" alt="error">
                <p>
                    Infelizmente essa funcionalidade ainda não está aberta para uso! 
                    Você receberá um alerta quando estiver liberada!
                </p>
                <div class="buttons">
                   <a href="perdidos.php"><button class="button1">Voltar a navegar</button></a>
                </div>                
            </div>
        </section>

        <footer>
            <div class="footerTop">
                <div>
                    <img src="img/logo.png" alt="SocialPet’s">
                </div>
                <div>
                    <h3>Redes Sociais</h3>
                    <div class='line'></div>
                    <div id="icons">
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-whatsapp"></i>
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
            </div>
            <p>© 2021 Copyright -  SocialPet’s</p>
        </footer>


        <script src="js/menu.js"></script>
    </body>
</html>