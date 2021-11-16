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
        
        <section id="wallper">
            <div class="imgMain">
                <img src="img/capa.png" alt="animals">
            </div>

            <div class="textMain">
                <div class="text">
                    <h1>SocialPet’s</h1>
                    <p>
                        Aqui você pode encontrar seu pet perdido 
                        e cadastrar animais abandonados  ajudando 
                        os a encontrar um novo lar.
                    </p>

                    <h4>
                        "Quando eu precisava de uma mão, encontrei 
                        uma pata."
                    </h4>

                    <a href="login.php">
                    <button>
                        Venha fazer o bem
                        <i class="fas fa-arrow-right"></i>
                    </button>
                    </a>
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