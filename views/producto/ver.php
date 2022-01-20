<?php if(isset($prod)): ?>

<h1><?=$prod->nombre?></h1>
 
    <div class="detail-product">
        <a href="<?= base_url ?>producto/ver&id=<?= $prod->id ?>">
            <?php if ($prod->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>"/>
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png"/>
            <?php endif; ?>    
            <h2><?= $prod->nombre ?></h2>
        </a>
        <p><?= $prod->descripcion ?></p>
        <p><?= $prod->precio ?></p>
        <a href="#" class="button" >Comprar</a>
    </div>

<?php else: ?>
        <h1>El producto no existe!</h1>
<?php endif; ?>
 
