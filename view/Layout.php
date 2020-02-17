
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="WEBBROOT/css/estilosHTML2.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="WEBBROOT/js/storage.js"></script>
        <title>Document</title>
    </head>
    <body>
        <nav>
            <?php if (!isset($_SESSION['DAW209POOusuario'])) { ?>
                <ul>
                    <li><a href="../../../index.php" target="_blank">HOME</a></li>
                    <li><a href="DOC/200113CatalogoDeRequisitos.pdf" target="_blank">Catalogo De Requisitos</a></li>
                </ul>
            <?php } ?> 
        </nav>
        <main>
            <section class="banner">
<!--                <div class="banner-content">
                    <h1>bienvenidos</h1>
                    <a href="#">Ve Mas</a>
                </div>-->
            </section>
            <?php require_once $vista; ?> 
        </main>
        <aside>
            <form class="form3" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <input type="submit"  value="CerrarSesion/Salir" name="cerrarSesion" id="cerrarSesion1">
            </form>
              <?php if ($_SESSION["pagina"] == "rest" || $_SESSION["pagina"] == "MtoDep") { ?>
               <form class="form3" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                 <input type="submit" name="volverInicio" value="VolverInicio" class="form-control  btn btn-secondary mb-1"> 
            </form>
            <?php } ?> 
            <?php if (!isset($_SESSION['DAW209POOusuario'])) { ?>
                <ul>
                    <li> <a href="WEBBROOT/img/estructuraalmacenamiento.png" target="_blank">Estructura de almacenamiento</a></li>
                </ul>
            <?php } ?> 
        </aside>
        <footer>
            <div class="footer-img"> <a href="../../../index.php">© 2020 Copyright: Ismael Heras Salvador</a> 
                <a href="http://daw-usgit.sauces.local/heras/LoginLogoffREST/tree/master" target="_blank" >
                    <img  src="WEBBROOT/img/gitLab.png" alt="GitLab"></a>
                
<!--                <a href="https://github.com/ismaelom83/LoginLogoffREST" target="_blank" ><img  src="WEBBROOT/img/gitHub.png" alt="GitHub"></a>-->
                <a href="DOC/loginphpdocumentor/index.html" target="_blank" ><img  src="WEBBROOT/img/documentor.png" alt="PHP"></a>
                <a href="https://www.zara.com/es/" target="_blank">pagina Imitada</a>
                <a href="DOC/200204-tema2.pdf" target="_blank">Tecnologias y herramientas</a>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>