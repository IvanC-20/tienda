<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>
    <a href="<?= base_url ?>carrito/index">Volver al pedido</a>
    </br></br>
    
    <h3>Dirección para el envío:</h3>
    <form action="<?=base_url?>pedido/add" method="POST">
        
        <label for="provincia" >Provincia:</label>
        <input type="text" name="provincia" required/>
        
        <label for="ciudad" >Ciudad:</label>
        <input type="text" name="localidad" required/>
        
        <label for="direccion" >Dirección:</label>
        <input type="text" name="direccion" required />
        
        <input type="submit" value="Confirmar Pedido"/>
        
    </form>
<?php else : ?>
    <h1>Necesitas estar identificado </h1>
    <p>Necesitas estar logueado en la web para poder realizar tu pedido</p>
<?php endif; ?>


