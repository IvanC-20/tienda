<h1>Registrarse</h1>
<?php require_once 'controllers/UsuarioController.php'; ?>
<?php if(isset($_SESSION['register']) && ($_SESSION['register'] == 'completed')) : ?>
        <div class="alerta alerta-exito" align="center" style="margin-left:300px; margin-right:300px;">
            <strong>Registro completado correctamente </strong>
        </div>    
<?php elseif(isset($_SESSION['errores']['general'])) : ?>
<div class="alerta alerta-error" align="center" style="margin-left:350px; margin-right:350px;">
            <?=$_SESSION['errores']['general'];?>
            <!-- <strong>Registro fallido </strong> -->
        </div>
<?php endif; ?>
    
        
       

<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" require/>
    <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'nombre'): ''; ?>
    
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" require/>
     <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
    
    <label for="email">Email</label>
    <input type="email" name="email" require/>
     <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'email') : ''; ?>
    
    <label for="password">Contraseña</label>
    <input type="password" name="password" require/>
     <?php echo isset($_SESSION['errores']) ? Utils::mostrarError($_SESSION['errores'], 'password') : ''; ?>
    <input type="submit" value="Registrarse"/>
    
</form>
<?php Utils::borrarErrores(); ?>
<?php Utils::deleteSession('register'); ?> 
