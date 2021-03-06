<?php

/**
 * Short Description
 *
 * Long Description
 *
 * @package      proyectoLoginLogoffREST
 * @author       Ismael Heras
 */
$entradaOK = true; //Inicializamos una variable que nos ayudara a controlar si todo esta correcto    
//Inicializamos un array que se encargara de recoger los errores(Campos vacios)
$aErrores = [
    'CodUsuario' => null,
    'DescUsuario' => null,
    'password1' => null,
    'password2' => null
];
//si pulsamos cerrar sesion destruye la sesion y nos lleva al inicio.
if (isset($_POST["cerrarSesion"])) {
    //destruye la sesion del usuario
    unset($_SESSION['DAW209POOusuario']);
    unset($_SESSION['pagina']);
    header('Location: index.html'); //nos redirige al login
    die(); //con die() terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente.
}
//si pulsamos el boton salir nos saca de la aplicacion
if (isset($_POST["VolverLogin"])) {
    header("Location: index.php");
    $_SESSION["pagina"] = "login"; //Se guarda en la variable de sesión la ventana de registro
    require_once $vistas["layout"]; //Se carga la vista correspondiente
}
//al pulsar el boton alatausuarios intentamos meter un usuario a la base de datos.
if (isset($_POST['altaUsuarios'])) {
    //La posición del array de errores recibe el mensaje de error si hubiera
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_POST['CodUsuario'], 15, 1, 1);  //maximo, mínimo y opcionalidad
    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_POST['DescUsuario'], 255, 1, 1); //maximo, mínimo y opcionalidad
    $aErrores['password1'] = validacionFormularios::comprobarAlfaNumerico($_POST['password1'], 64, 4, 1); //maximo, mínimo y opcionalidad
    $aErrores['password2'] = validacionFormularios::comprobarAlfaNumerico($_POST['password2'], 64, 4, 1); //maximo, mínimo y opcionalidad
    //Autenticación con la base de datos
    foreach ($aErrores as $key => $value) {
        if ($value != NULL) {
            $entradaOK = false;
        }
    }
    if ($entradaOK) {
        $codUsuario = $_POST['CodUsuario'];
        $descUsuario = $_POST['DescUsuario'];
        $password = $_POST['password1'];
        $password2 = $_POST['password2'];

        //control para saber si las password son iguales.
        if ($password === $password2) {
            
            //si ya existe el usuario muestra un error y recarga el registro
            if (UsuarioPDO::validarCodNoExiste($codUsuario)) {
                $aErrores['CodUsuario'] = "duplicado de clave primaria";
                $vista = $vistas["registro"];
                $_SESSION['pagina'] = "registro";
                require_once $vistas["layout"];
            } else {
               
                $accesos = 0;
                $generar_password = hash('sha256', $codUsuario . $password);
                //crea el usuario llamando al metodo altaUsuario.
                $objetoUsuario = UsuarioPDO::altaUsuario($codUsuario, $descUsuario, $generar_password, $accesos);
                //metemos en la sesion el objeto creado.
                $_SESSION["DAW209POOusuario"] = $objetoUsuario;
                //y guardamos en la sesion pagina el inicio para que carge el inicio el index.
                $_SESSION['pagina'] = "inicio";
                //nos dirigimos a al index que cargara el inicio con la sesion del usuario.
                header("Location: index.php");
                exit;
            }
        }
         $aErrores['password2'] = "Las contraseñas no coinciden";
    }
  
}
$vista = $vistas["registro"];
$_SESSION['pagina'] = "registro";
require_once $vistas["layout"];

