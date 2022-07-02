<?php
require_once 'models/producto.php';
class carritoController{
    
    public function index(){
        if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >=1){
            $carrito = $_SESSION['carrito'];
            //echo  ('<pre>');
            //print_r($carrito); veo arreglo de forma legible
            //echo('</pre>');
            echo '</br>';
            
        }else{
           $carrito = array(); 
        }   
        require_once 'views/carrito/index.php';
    }
    
    public function add() {
        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else{
            header('Location:'.base_url);
        }
        
        if (isset($_SESSION['carrito'])){
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if($elemento['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
        if(!isset($counter) || $counter == 0){
            //conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();
            
            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
            
        }
        
        header("Location:".base_url."carrito/index");
        
    }
    
    public function remove() {
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location:".base_url."carrito/index");
    }
    
    public function up() {
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header("Location:".base_url."carrito/index");
    }
    
    public function down() {
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;
            if($_SESSION['carrito'][$index]['unidades'] == 0){
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("Location:".base_url."carrito/index");
    }
    
    public function deleteAll() {
        unset($_SESSION['carrito']);
        //redirecciono, ya que si vuelvo a llamar a la vista require_once 'views/carrito/index.php';
        //me queda el sidebar carrito cargado, estaría mal hecho (solo cambia la pantalla central)
        header("Location:".base_url."carrito/index");
    }
}
