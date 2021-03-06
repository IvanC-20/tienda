<?php
require_once 'models/pedido.php';

class pedidoController{
    
    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }
    
    public function add() {
        
       if(isset($_POST['sent'])){
           
           foreach ($_SESSION['carrito'] as $indice => $elemento) {
               $stock = new Pedido();
               $producto = $elemento['producto'];
               if($elemento['unidades'] > 1){
                   $newStock = $producto->stock - $elemento['unidades'];
               }else{
                   $newStock = $producto->stock - 1;
               }
               $stock->updateStock($producto->id, $newStock );
           }
       } 
        
       if(isset($_SESSION['identity'])){
           //Guardar en db
            $usuario_id = $_SESSION['identity']->id;                     
            $provincia = isset($_POST['provincia'])? $_POST['provincia']: false;
            $localidad = isset($_POST['localidad'])? $_POST['localidad']: false;
            $direccion = isset($_POST['direccion'])? $_POST['direccion']: false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];
            
                
            
            if($provincia && $localidad && $direccion){
                        $pedido = new Pedido();
                        $pedido->setUsuario_id($usuario_id);
                        $pedido->setProvincia($provincia);
                        $pedido->setLocalidad($localidad);
                        $pedido->setDireccion($direccion);
                        $pedido->setCoste($coste);
                        
                        $save = $pedido->save();
                        
                        //Guardar linea pedido
                        $save_linea = $pedido->save_linea();
                        
                        if($save && $save_linea){
                            $_SESSION['pedido']='complete';
                        }else{
                            $_SESSION['pedido']='failed';
                        }
                        
            }else{
                $_SESSION['pedido']='failed';
            }
            
            header("Location:".base_url."pedido/confirmado");
            
       } else {
           //Redirigir al index
           header('Location:'.base_url);
       }
    }
    
    public function confirmado() {
        if (isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);
            
            $pedido = $pedido->getOneByUser();
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
             
        }
        
        require_once 'views/pedido/confirmado.php';    
     }
     
     public function misPedidos() {
         Utils::isUser();
         $usuario_id = $_SESSION['identity']->id;
         $pedido = new Pedido();
         $pedido->setUsuario_id($usuario_id);
         $pedidos = $pedido->getAllByUser();
         require_once 'views/pedido/misPedidos.php';
         
     }
     
     public function detallePedido() {
         Utils::isUser();
         if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            //sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOnePedidoById();
            
            //sacar los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
            
             //sacar el usuario
            $pedido_usuario = new Pedido();
            $user = $pedido_usuario->getDataUserByPedido($pedido->id);
            //var_dump($user);
            //die();
            require_once 'views/pedido/detalle.php';
         }else{
             header("Location:".base_url."pedido/misPedidos");
         }   
        
     }
     
     public function gestion() {
         Utils::isAdmin();
         $gestion = true;
         $pedido = new Pedido();
         $pedidos = $pedido->getAll(); 
         require_once 'views/pedido/misPedidos.php';
         
     }
     
     public function estado() {
         Utils::isAdmin();
         if(isset($_POST['pedido_id']) && isset($_POST['estado'] )){
             //Recoger datos form
             $id = $_POST['pedido_id'];
             $estado = $_POST['estado'];
             //Update pedido
             $pedido = new Pedido();
             $pedido->setId($id);
             $pedido->setEstado($estado);
             $pedido->updateOne();
             
             header('Location:'.base_url.'pedido/detallePedido&id='.$id);
         }else{
             header('Location:'.base_url);
         }
         
     }
}    