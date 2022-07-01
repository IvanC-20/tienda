<h1><b>Detalle del Pedido</b></h1> 
<?php if (isset($pedido)) : ?>

    <?php if (isset($_SESSION['admin'])): ?>
        <h3>Estado</h3>
        <form action="<?= base_url ?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id" />
            <select name="estado">
                <option value="confirm" <?= $pedido->estado == 'confirm' ? 'selected' : '' ; ?> >Pendiente</option>
                <option value="preparated" <?= $pedido->estado == 'preparated' ? 'selected' : '' ; ?> >En preparación</option>
                <option value="ready" <?= $pedido->estado == 'ready' ? 'selected' : '' ; ?> >Preparado para enviar</option>
                <option value="sended" <?= $pedido->estado == 'sended' ? 'selected' : '' ; ?> >Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado" />
        </form>
        
    <?php endif; ?>

    <h3>Datos de envío</h3>
    Provincia: <?= $pedido->provincia ?> </br>
    Localidad: <?= $pedido->localidad ?> </br>
    Dirección: <?= $pedido->direccion ?> </br>

    <h3>Datos del pedido</h3>
    Estado: <?= Utils::showStatus($pedido->estado) ?> </br>
    Número de pedido: <?= $pedido->id ?> </br>
    Dirección: <?= $pedido->direccion ?> </br>
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
      


