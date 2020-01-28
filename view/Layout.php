

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
            <ul>
                <li><a href="../../../index.php">HOME</a></li>
                <li><a href="DOC/loginphpdocumentor/index.html">PHP Doc</a></li>
                <li><a href="WEBBROOT/img/diagrama.png">Diagrama Clases</a></li>
                <li><a href="DOC/200113CatalogoDeRequisitos.pdf">Catalogo De Requisitos</a></li>
                <li><a href="DOC/casosdeuso.png">Casos De Uso</a></li>
            </ul>
        </nav>
        <main>
            <section class="banner">
                <div class="banner-content">
                    <h1>bienvenidos</h1>
                    <a href="#">Ve Mas</a>
                </div>
            </section>
            <?php require_once $vista; ?> 
        </main>
        <aside>
            <form class="form3" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <input type="submit"  value="CerrarSesion/Salir" name="cerrarSesion" id="cerrarSesion1">
            </form>
            <ul>
                <li> <a href="WEBBROOT/img/estructuraalmacenamiento.png">Estructura de almacenamiento</a></li>
                <li> <a href="DOC/datos.pdf">Modelo Fisico De Datos</a></li>
                  <li><a href="WEBBROOT/img/navegacion.png">Arbol De Navegacion</a></li>
            </ul>
        </aside>
        <footer>
            <div class="footer-img"> <a href="../../../index.php">© 2020 Copyright: Ismael Heras Salvador</a> 
                <a href="http://daw-usgit.sauces.local/heras/proyectoLoginLogoffPOO/tree/master" target="_blank" >
                    <img  src="WEBBROOT/img/gitLab.png" alt="GitLab"></a>
                <a href="https://github.com/ismaelom83/proyectoLoginLogoffPOO" target="_blank" ><img  src="WEBBROOT/img/gitHub.png" alt="GitHub"></a>
                <a href="https://www.zara.com/es/" target="_blank">pagina Imitada</a>
                 <a href="DOC/191013-indice-heraclio-tema2.pdf" target="_blank">Tecnologias y herramientas</a>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>