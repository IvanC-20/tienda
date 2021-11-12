<?php

require_once 'models/categoria.php';

class categoriaController{
    
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    
    public function save(){
        Utils::isAdmin();
        
        if(isset($_POST) && isset($_POST['nombre'])){
                $error = array();
                $nombre = $_POST['nombre'];
                // Validar campo nombre
                if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                    $nombre_validado = true;
                }elseif(empty ($nombre)){
                    $nombre_validado = false;
                    $error['nombre']= "Complete este campo";
                }else{
                    $nombre_validado = false;
                    $error['nombre'] = "El nombre no es válido"; 
                }
                
                if($nombre_validado){
                        //Guardar la categoria en la base de datos
                        $categoria = new Categoria();
                        $categoria->setNombre($nombre);
                        $save = $categoria->save();
                        if($save){
                            $_SESSION['reg_cat'] = 'completed';
                        }else{
                            $_SESSION['error_cat'] = $error;
                        }
                 }else{
                        $_SESSION['error_cat'] = $error;
                 }       
        
        }
        header("Location:".base_url."categoria/crear");
    }
    
}
