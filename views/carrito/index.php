<h1>Carrito de la compra</h1>

<table>
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Imagen</th>
    </tr>
    <?php foreach ($carrito as $indice => $elemento) : 
        $producto = $elemento['producto'];?>
    <tr>
        
        <td> <a href="<?= base_url ?>producto/ver&id=<?=$producto->id?>"> <?= $producto->nombre ?></td></a>
        <td><?= $producto->precio ?></td>
        <td><?= $elemento['unidades'] ?></td>
        <td><?php if ($producto->imagen != null): ?>
            <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/>
                <?php else: ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito"/>
                <?php endif; ?></td>
    </tr>
    <?php endforeach; ?>

    
</table>

<div class="total-carrito">
<?php $stats= Utils::statsCarrito(); ?>
<h3>Precio total: $ <?=$stats['total']?></h3>
<a href="#" class="button button-pedido"> Hacer Pedido</a>

</div>
