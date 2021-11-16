<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.png">
    <title>SocialPet's</title>
</head>
<body>
     <!--Modal-->

     <section class="modal">
            <div class="modalsection">
                <h1>Escolha o que deseja ver</h1>
                <p>
                    Você pode escolher qual aba deseja visualizar primeiro,
                     basta clicar no botão de sua preferência!!
                </p>
                <div class="buttons">
                   <a href="perdidos.php"><button class="button1">Ver animais perdidos</button></a>
                   <a href="abandonados.php"><button class="button2">Ver animais abandonados</button></a>
                </div>                
            </div>
        </section>

        <script src="js/modalScreen.js"></script>
</body>
</html>

<?php
require_once "class/Conexao.php";
require_once "class/Usuarios.php";
$Usuarios = new Usuarios;

if(isset($_POST["cadastrar"]) && !empty($_POST["email"])  && !empty($_POST["senha"])){
    $dadosUsuarios = $Usuarios->inserirUsuario($_POST["email"],$_POST["senha"]);
    
    if($_SESSION['token'] === 1){
        echo'<script>OpenModal()</script>';
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
                <a href="login.php"><button>Login</button></a>
            </div>

            <div class="hamburguer">
                <i class="fas fa-bars"></i>
            </div>
        </header> 

        <div class="menuDown">
            <ul>
                <a href="login.php"><button>Login</button></a>
            </ul>
        </div>  

        <section class="forms">
            <form action="cadastro.php" method="POST" class="inicialize">
                <h1>Crie sua Conta</h1>
                <div class="fields">
                    <div class="field">
                        <img src="img/email.png" alt="">
                        <input type="text" placeholder="Email" name="email">
                    </div>

                    <div class="field">
                        <img src="img/password.png" alt="">
                        <input type="text" placeholder="Password" name="senha" id="password">
                        <i class="fas fa-eye visible"></i>
                        <i class="fas fa-eye-slash invisible"></i>
                    </div>
                </div>

                <button type="submit" name="cadastrar">Entrar</button>
                <p>Não possui uma conta? <a href="login.php" name="login">Faça Login</a></p>
            </form>
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
        <script src="js/password.js"></script>
    </body>
</html>