
<div class="wrap">
    <h1>LOGIN</h1>
    <form action="<?php $_GET['pagina']=$controladores['login']; echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <label for="usuario"></label><br>
            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Introduce Usuario:" value="">
            
            <label for="password"></label><br>
            <input type="text" name="password" id="password" class="form-control" placeholder="Introduce Password:" value="">                       
            <br>
            <div class="botones2">
                <input type="submit" name="enviar" id="enviar"  value="IniciarSesion" class="form-control  btn btn-secondary mb-1">
                <br><br>
                  <input type="submit" name="registro" value="Registrarse" class="form-control  btn btn-secondary mb-1"> 
                  <input type="checkbox" id="check">
                  <label for="check">Recordar Usuario</label>
                <br>           
            </div>
        </fieldset>
    </form>
</div>                       
<br/>
<br/>   