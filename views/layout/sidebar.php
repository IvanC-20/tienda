<!-- Barra lateral -->
<aside id="lateral">
    <div id="login" class="block-aside">
        <?php if (!isset($_SESSION['identity'])): ?>   
            <h3>Entrar a la web</h3>
            <form action="<?= base_url ?>usuario/login" method="POST"> 
                <label for="email">Email</label>
                <input type="email" name="email"/>

                <label for="password">Contraseña</label>
                <input type="password" name="password"/>
                <?php echo isset($_SESSION['error_login']) ? Utils::mostrarError($_SESSION['error_login'], '') : ''; ?>     
                <input type="submit" value="Enviar"/>
            </form> 

        <?php else: ?>
            <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>   
        <?php endif; ?>
        <ul>

            <?php if (isset($_SESSION['admin'])): ?> 
                <li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
                <li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
            <?php endif; ?>   

            <?php if (isset($_SESSION['identity'])): ?>  
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="<?= base_url ?>usuario/logout">Cerrar sesión</a></li>
            <?php else: ?>
                <li><a href="<?= base_url ?>usuario/registro">Registrarse</a></li>
            <?php endif; ?>
        </ul>
    </div>    

</aside>
<?php Utils::borrarErrores(); ?>
<!-- Principal -->
<div id="principal">