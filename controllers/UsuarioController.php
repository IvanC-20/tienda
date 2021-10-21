<?php
require_once 'models/usuario.php';


class usuarioController{
    
    public function index(){
        echo 'controlador usuario, accion index';
    }
    
    public function registro(){
        require_once 'views/usuario/registro.php';
        
    }
    
    public function save(){
        
       if(isset($_POST)){
           //Array de errores
           $errores = array();
           
           $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
           // Validar campo nombre
            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $nombre_validado = true;
            }elseif(empty ($nombre)){
                $nombre_validado = false;
                $errores['nombre']= "Complete este campo";
            }else{
                $nombre_validado = false;
                $errores['nombre'] = "El nombre no es válido"; 
            }
            
           $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
           
            // Validar campo apellidos
            if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
                $apellidos_validado = true;
            }elseif(empty ($apellidos)){
                $apellidos_validado = false;
                $errores['apellidos']= "Complete este campo";
            }else{
                $apellidos_validado = false;
                $errores['apellidos'] = "Los apellidos no son válidos"; 
            }
            
           $email = isset($_POST['email']) ? $_POST['email'] : false;
           // Validar campo email

            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_validado = true;
            }elseif(empty ($email)){
                $email_validado = false;
                $errores['email']= "Complete este campo";
            }else{
                $email_validado = false;
                $errores['email'] = "El email no es válido"; 
            }
           
           $password = isset($_POST['password']) ? $_POST['password'] : false; 
           // Validar la contraseña

            if (!empty($password)){
                $password_validado = true;
            }else{
                $password_validado = false;
                $errores['password'] = "Complete este campo"; 
            }
         
           
           if($nombre_validado && $apellidos_validado && $email_validado && $password_validado){
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellidos($apellidos);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);
                    $save = $usuario->save();
                   
                    if ($save){
                        $_SESSION['register'] = 'completed';
                    }else{
                         $_SESSION['errores']= $errores;
                        //$_SESSION['errores'] ['general'] = "Error al insertar usuario!";
                        //$_SESSION['register'] = 'failed';
                    }
            }else{
                        $_SESSION['errores']= $errores;
                        //$_SESSION['errores'] ['general'] = "Error al insertar usuario!";
                        //$_SESSION['register'] = 'failed';
            }
       }else {
                 $_SESSION['errores'] ['general'] = "Error al insertar usuario!";   
                 //$_SESSION['register'] = 'failed';  
       }
        header("Location:".base_url."usuario/registro");
    }
}
