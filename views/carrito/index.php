<h1>Carrito de la compra</h1>
<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >=1): ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($carrito as $indice => $elemento) : 
            $producto = $elemento['producto'];?>
        <tr>

            <td> <a href="<?= base_url ?>producto/ver&id=<?=$producto->id?>"> <?= $producto->nombre ?></td></a>
            <td><?= $producto->precio ?></td>
            <td> 
                    <?= $elemento['unidades'] ?>
                <?php if($elemento['unidades']<= ($producto->stock - 1)): ?>
                <div class="updown-unidades">
                    <a align="center" href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button">-</a>
                    <a align="center" href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button">+</a>
                </div>
                <?php else: ?>
                <div class="updown-unidades">
                    <a align="center" href="<?=base_url?>carrito/down&index=<?=$indice?>" class="button">-</a>
                    <a align="center" href="#" class="button button-red">+</a>
                    <p style="color:gray">Stop stock</p>
                </div>
                <?php endif;?>
            </td>
            <td>
                <?= $producto->stock ?>
            </td>
            <td><?php if ($producto->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/>
                    <?php else: ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito"/>
                    <?php endif; ?></td>
            <td><a align="center" href="<?=base_url?>carrito/remove&index=<?=$indice?>" class="button button-carrito button-red">Quitar Producto</a></td>
        </tr>
        <?php endforeach; ?>


    </table>

<div class="delete-carrito">
    <a href="<?=base_url?>carrito/deleteAll" class="button button-delete button-red">Vaciar carrito</a>
</div>

<div class="total-carrito">
    <?php $stats= Utils::statsCarrito(); ?>
    <h3>Precio total: $ <?=$stats['total']?></h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido"> Hacer Pedido</a>

</div>
<?php else: ?>
<p>Su carrito está vacio, añada los productos deseados...</p>
<?php endif; ?>