<h1>Cargar Productos</h1>


<form action="<?=base_url?>producto/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" />
    
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion"></textarea>
    
    <label for="precio">Precio</label>
    <input type="text" name="precio" />
    
    <label for="stock">Stock</label>
    <input type="number" name="stock" />
    
    <label for="nombre">Categoría</label>
    <select name="categoria">
        <?php $categorias = Utils::showCategorias(); ?>
        <?php while($cat = $categorias->fetch_object()):?>
        <option value="<?=$cat->id?>">
                <?=$cat->nombre?>
        </option>    
        <?php endwhile; ?>
    </select>
    
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" />
    
    <input type="submit" value="Guardar" />


</form>