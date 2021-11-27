<h1>Crear nueva categoría</h1>

<?php require_once 'controllers/CategoriaController.php'; ?>

<?php if(isset($_SESSION['reg_cat']) && ($_SESSION['reg_cat'] == 'completed')) : ?>
        <div class="alerta alerta-exito" align="center" style="margin-left:300px; margin-right:300px;">
            <strong>Categoría añadida </strong>
        </div>    
<?php elseif(isset($_SESSION['error_cat'])) : ?>
<div class="alerta alerta-error" align="center" style="margin-left:350px; margin-right:350px;">
            <strong>Registro fallido </strong> 
        </div>
<?php endif; ?>

<form action="<?=base_url?>categoria/save" method="POST">
    
    <label for="nombre"> Nombre </label>
    <input type="text" name="nombre" required/>
    <?php echo isset($_SESSION['error_cat']) ? Utils::mostrarError($_SESSION['error_cat'], 'nombre'): ''; ?>
    
    <input type="submit" value="Guardar">
</form>    

<?php Utils::borrarErrores(); ?>
<?php Utils::deleteSession('reg_cat'); ?> 