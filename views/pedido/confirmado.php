<?php if(isset($_SESSION['pedido']) && ($_SESSION['pedido'] == 'complete')): ?>
<h1><b>Tu pedido ha sido realizado con éxito!</b></h1>

    <p>
       Tu pedido ha sido guardado con éxito, una vez realices el pago a la cuenta 
       AA45638256/7 por el costo total del pedido será procesado y enviado.
    </p>
    </br>
    <?php if(isset($pedido)) : ?>
    <h3>Datos del pedido: </h3>
    
    
    Número de pedido: <?= $pedido->id ?>     </br>
    Total a pagar: <?= $pedido->coste ?>     </br>
    Productos:  
    
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
    <?php 
          
    Utils::deleteSession('carrito');      
    ?>      
    <?php endif; ?>
<?php elseif(isset($_SESSION['pedido']) && ($_SESSION['pedido'] != 'complete')): ?>
    <h1>Tu pedido no se pudo realizar...</h1>
<?php endif; ?>
