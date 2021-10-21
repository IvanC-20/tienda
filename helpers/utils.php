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
    return $alerta;
}

function borrarErrores(){
    $borrado = false;
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        //unset($_SESSION['errores']);
        $borrado = true;
    }
    
        
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        $borrado = true;
    }
    return $borrado;
}
}