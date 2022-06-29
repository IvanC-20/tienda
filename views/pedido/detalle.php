<h1>Detalle del Pedido</h1> 
<?php if(isset($pedido)) : ?>
<h3>Datos de envío</h3>
    Provincia: <?=$pedido->provincia?> </br>
    Localidad: <?=$pedido->localidad?> </br>
    Dirección: <?=$pedido->direccion?> </br>

<h3>Datos del pedido</h3>
    Número de pedido: <?=$pedido->id?> </br>
    Dirección: <?=$pedido->direccion?> </br>
    Total abonado:  $<?= $pedido->coste ?> </br>
    Productos: </br>
    <table>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                    <th>Imagen</th>
                </tr>
                <?php while ($prod = $productos->fetch_object()): ?>
                    <tr>

                        <td> <a href="<?= base_url ?>producto/ver&id=<?= $prod->id ?>"> <?= $prod->nombre ?></td></a>
                        <td><?= $prod->precio ?></td>
                        <td><?= $prod->unidades ?></td>
                        <td><?php if ($prod->imagen != null): ?>
                                <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" class="img_carrito"/>
                            <?php else: ?>
                                <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito"/>
                            <?php endif; ?></td>
                    </tr>
               <?php endwhile; ?>  </br> 
            </table> 
            <?php endif; ?>
      


