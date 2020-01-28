<?php
require_once 'model/Usuario.php';
require_once 'model/UsuarioPDO.php';
//si pulsamos el boton nos lleva  al registro.
if (isset($_POST["borrarCuenta"])) {
    $_SESSION['DAW209POOusuario'];
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "borrarCuenta"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}
//si pulsamos el boton nos lleva  al registro.
if (isset($_POST["editarPerfil"])) {
    $_SESSION['DAW209POOusuario'];
    header('Location: index.php'); //Se le redirige al index
    $_SESSION["pagina"] = "miCuenta"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
    exit;
}
//si pulsamos salir nos saca del incio y nos lleva de nuevo al login
if (isset($_REQUEST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    //nos dirige al login
    header("location: index.html");
} else { //si no estaremos en el inicio
     
//asignamos los valores de la sesion del usuario logeado en variables que mostraremos en la vista.
    //saludo inicial con la descripcion del usuario.
    $saludoInicial = "Hola ". $_SESSION["DAW209POOusuario"]->getDescUsuario()." Bienvenido a la aplicacion LoginLogoffPOO";
    //sacamos el perfil del usuario y damos acceso alas funcionalidades de cada rol.
    $perfil = $_SESSION["DAW209POOusuario"]->getPerfil(); 
    
   //if para diferenciar de la pprimera vez que te logeas y la ultima conexion
   //si te logeas por primera vez no tendras hora de ultima conexion.
  if($_SESSION["DAW209POOusuario"]->getContadorAccesos() == 0){
      $accesosT = "Esta es la primera vez que te logeas";
      $ultimaConexion = "";
  }else{
      //sumamos uno al contador de accesos de la sesion del usuario
       $accesosT = "Esta es la ".($_SESSION["DAW209POOusuario"]->getContadorAccesos() +1 )."º vez que te logeas";
       //hora de la ultima conexion si es la segunda vez como minimo que accedemos.
        $ultimaConexion = "La ultima vez que te conectaste fue el ".$_SESSION["DAW209POOusuario"]->getUltimaConexion();
  }
    $vista = $vistas['inicio']; 
     $_SESSION["DAW209Pagina"] = "inicio";
    /**
     * requerimosa el layout de la vista
     */
    require_once $vistas['layout'];
}
