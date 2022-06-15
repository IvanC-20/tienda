<?php

class Pedido{
    
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    
    private $db;
   
    
     public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id): void {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia): void {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setLocalidad($localidad): void {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    function setDireccion($direccion): void {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste): void {
        $this->coste = $coste;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

    function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    function setHora($hora): void {
        $this->hora = $hora;
    }

    
    public function getAll(){
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;        
    }
    
       
      public function getOne(){
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $producto->fetch_object();        
    }
    
 
        public function save() {
        $sql = "INSERT INTO pedidos VALUES (null, '{$this->getUsuario_id()}','{$this->getProvincia()}', "
                . "'{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME() );";
                
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    
      
}

