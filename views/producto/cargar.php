<?php if(isset($edit) && isset($prod) && is_object($prod)): ?>
    <h1>Editar Producto <?=$prod->nombre?></h1>
    <?php $url_action = base_url."producto/editar".$prod->id; ?>
<?php else: ?>
    <h1>Cargar nuevo Producto</h1>
    <?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>


<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data" >
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= isset($prod) && is_object($prod)? $prod->nombre : ''; ?>" />
    
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion"><?= isset($prod) && is_object($prod)? $prod->descripcion : ''; ?></textarea>
    
    <label for="precio">Precio</label>
    <input type="text" name="precio" value="<?= isset($prod) && is_object($prod)? $prod->precio : ''; ?>"/>
    
    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?= isset($prod) && is_object($prod)? $prod->stock : ''; ?>"/>
    
    <label for="nombre">Categoría</label>
    <select name="categoria" >
        <?php $categorias = Utils::showCategorias(); ?>
        <?php while($cat = $categorias->fetch_object()):?>
        <option value="<?=$cat->id?>" <?= isset($prod) && is_object($prod) && $cat->id == $prod->categoria_id ? 'selected': '';?> >
                <?=$cat->nombre?>
        </option>    
        <?php endwhile; ?>
    </select>
    
    <label for="imagen">Imagen</label>
    <?php if(isset($prod) && is_object($prod) && !empty($prod->imagen)): ?>
    <img src="<?=base_url?>/uploads/images/<?=$prod->imagen ?>" />
    <?php endif; ?>
    <input type="file" name="imagen" />
    
    <input type="submit" value="Guardar" />


</form>