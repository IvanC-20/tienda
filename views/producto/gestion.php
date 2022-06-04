<h1>Gestion de productos</h1>

<a href="<?=base_url?>producto/cargar" class="button button-small">
    Cargar
</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'):?>
        <strong class="alerta">El producto se a cargado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed'):?>
        <strong class="alerta-error">El producto no se ha podido cargar</strong>     
<?php endif; ?>
        
<?php Utils::deleteSession('producto'); ?>    
        

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed'):?>
        <strong class="alerta">El producto se a eliminado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'):?>
        <strong class="alerta-error">El producto no se ha podido eliminar</strong>     
<?php endif; ?>
        
<?php Utils::deleteSession('delete'); ?>         
        
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Oferta</th>
        <th>Fecha</th>
        <th>Imagen</th>
        <th>Acciones</th>
        
    </tr>
<?php while($prod = $productos->fetch_object()): ?>
    <tr>
        <td><?=$prod->id?></td>
        <td><?= $prod->nombre?></td>
        <td><?= $prod->descripcion?></td>
        <td><?= $prod->precio?></td>
        <td><?= $prod->stock?></td>
        <td><?= $prod->oferta?></td>
        <td><?= $prod->fecha?></td>
        <td><?php if ($prod->imagen != null): ?>
            <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" class="img_carrito"/>
                <?php else: ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito"/>
                <?php endif; ?> 
        <td>
            <!-- ? sirve para pasar el 1er param get aqui usamos & xq vamos a pasar un 3er param -->
            <a href="<?=base_url?>producto/editar&id=<?=$prod->id?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>producto/borrar&id=<?=$prod->id?>" class="button button-red">Eliminar</a>
        </td>
    </tr>
    
 <?php endwhile; ?>   
</table>