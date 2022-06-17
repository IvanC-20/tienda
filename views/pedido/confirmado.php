<?php if(isset($_SESSION['pedido']) && ($_SESSION['pedido'] == 'complete')): ?>
    <h1>Tu pedido ha sido realizado con éxito!</h1>

    <p>
       Tu pedido ha sido guardado con éxito, una vez realices el pago por el costo total del pedido
       será procesado y enviado.
    </p>
<?php elseif(isset($_SESSION['pedido']) && ($_SESSION['pedido'] != 'complete')): ?>
    <h1>Tu pedido no se pudo realizar...</h1>
<?php endif; ?>
