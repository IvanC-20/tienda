<?php

require_once 'models/categoria.php';

class categoriaController{
    
    public function index(){
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }
    
}
