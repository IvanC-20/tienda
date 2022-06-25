<?php

class Utils{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
        unset($_SESSION[$name]);
        }
        return $name;
    }
    
    function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class = 'alerta alerta-error'>".$errores[$campo]."</div>";
    }
    
    if( isset($_SESSION['error_login'])){
        $alerta = "<div class = 'alerta alerta-error'>".$_SESSION['error_login']."</div>";
    }
    return $alerta;
}

    function borrarErrores(){
        $borrado = false;
        if(isset($_SESSION['errores'])){
            $_SESSION['errores'] = null;
            //unset($_SESSION['errores']);
            $borrado = true;
        }
        
         if(isset($_SESSION['error_cat'])){
            $_SESSION['error_cat'] = null;
            //unset($_SESSION['errores']);
            $borrado = true;
         }
         
        if(isset($_SESSION['completado'])){
            $_SESSION['completado'] = null;
            $borrado = true;
        }
        
        if(isset( $_SESSION['error_login'])){
             $_SESSION['error_login'] = null;
            $borrado = true;
        }
        
        return $borrado;
    }

    public static function isAdmin(){
            if(!isset($_SESSION['admin'])){
                header("Location:".base_url);
            }else{
                return true;
            }
    }
    
    public static function isUser(){
            if(!isset($_SESSION['identity'])){
                header("Location:".base_url);
            }else{
                return true;
            }
    }
    
    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }
    
    public static function statsCarrito(){
        $stats = array(
          'count' => 0,
          'total' => 0  
        );
        
        if(isset($_SESSION['carrito'])){
            $stats['count']= count($_SESSION['carrito']);
            
            foreach ($_SESSION['carrito'] as $producto) {
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }
        return $stats;
    }
    
}//fin clase Utils