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
        $pedidos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $pedidos;        
    }
    
     public function getAllByUser(){
        $sql = "SELECT * FROM pedidos WHERE usuario_id = {$this->getUsuario_id()}  ORDER BY id DESC"; 
        $misPedidos = $this->db->query($sql);
        return $misPedidos;        
    }
    
       
      public function getOne(){
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $producto->fetch_object();        
    }
    
        public function getOneByUser(){
        $sql = "SELECT id, coste FROM pedidos "
                ."WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";    
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();        
        }
        
        public function getDataUserByPedido($id){
        $sql = "SELECT * FROM usuarios u "
               ."INNER JOIN pedidos p ON u.id = p.usuario_id " 
               ."WHERE p.id = {$id}";    
        $usuario = $this->db->query($sql);
        return $usuario->fetch_object();        
        }
        
        public function getOnePedidoById(){
        $sql = "SELECT * FROM pedidos "
               ."WHERE id = {$this->getId()}";    
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();        
        }
        
        public function getProductosByPedido($id) {
           // $sql = "SELECT * FROM productos WHERE id IN "
           //        ."(SELECT producto_id FROM lineas_pedidos WHERE pedido_id = {$id})";
                   
            $sql = "SELECT pr.*, lp.unidades FROM productos pr "
                   ."INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
                   ."WHERE lp.pedido_id = {$id}"; 
                   
         $productos = $this->db->query($sql);
         return $productos;
            
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
    
    public function save_linea(){
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        
        foreach ($_SESSION['carrito'] as $elemento){ 
            $producto = $elemento['producto'];
            
            $insert = "INSERT INTO lineas_pedidos VALUES (null, {$pedido_id}, {$producto->id}, {$elemento['unidades']});";
            $save = $this->db->query($insert);
        }

        $result = false;
        if($save){
            $result = true;
        }
        return $result;        
        
    }
    
    public function updateOne() {
         $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}'"
                ." WHERE id = {$this->getId()};" ;
        
                
        $save = $this->db->query($sql);
     
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
      
}

    