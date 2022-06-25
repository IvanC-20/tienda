
<h1>Mis pedidos:</h1>
<?php if(isset($pedidos)): ?>
    <table>
    <tr>
        <th>N°</th>
        <th>ID Usuario</th>
        <th>Coste</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Hora</th>
    </tr>
    <?php while($ped = $pedidos->fetch_object()): ?>
    <tr>
        <td><a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>" ><?=$ped->id?></a></td>
        <td><?=$ped->usuario_id?></td>
        <td><?=$ped->coste?></td>
        <td><?=$ped->estado?></td>
        <td><?=$ped->fecha?></td>
        <td><?=$ped->hora?></td>
    </tr>    
    <?php endwhile; ?>
        
</table>
<?php endif; ?>
