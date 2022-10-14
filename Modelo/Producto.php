<?php
include_once 'conector/BaseDeDatos.php';

class Producto{
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $tipo;
    private $imagen;
    private $mensaje;

    public function __construct()
    {
        $this->idProducto = "";
        $this->nombre = "";
        $this->descripcion = "";
        $this->precio = "";
        $this->stock = "";
        $this->tipo = "";
        $this->imagen = "";
    }

    public function cargar($idProducto, $nombre, $descripcion, $precio, $stock, $tipo, $imagen){
        $this->setIdProducto($idProducto);
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setPrecio($precio);
        $this->setStock($stock);
        $this->setTipo($tipo);
        $this->setImagen($imagen);
    }

    public function getIdProducto(){
        return $this->idProducto;
    }

    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function setMensaje($mensaje){
        $this->mensaje = $mensaje;
    }

    public function __toString()
    {
        return "ID: " . $this->getIdProducto() .
            "\nNombre: " . $this->getNombre() .
            "\nDescripcion: " . $this->getDescripcion() . 
            "\Precio: " . $this->getPrecio() . 
            "\nStock: " . $this->getStock() . 
            "\Tipo: " . $this->getTipo().
            "\Imagen: ". $this->getImagen();
    }

    //FUNCIONES BD
    //BUSCAR
    public function buscar($idProducto)
    {
        $base = new BaseDatos();
        $resp = false;
        $sql = "SELECT * FROM producto WHERE idProducto = '" . $idProducto . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($row2 = $base->Registro()) {
                    $this->setIdProducto($row2['idProducto']);
                    $this->setNombre($row2['nombre']);
                    $this->setDescripcion($row2['descripcion']);
                    $this->setPrecio($row2['precio']);
                    $this->setStock($row2['stock']);
                    $this->setTipo($row2['tipo']);
                    $this->setImagen($row2['imagen']);
                    $resp = true;
                }
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        return $resp;
    }

    //LISTAR
    public function listar($condicion = '')
    {
        $array = null;
        $base = new BaseDatos();
        $sql =  "select * from producto";
        if ($condicion != '') {
            $sql = $sql . ' where ' . $condicion;
        }
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $array = array();
                while ($row2 = $base->Registro()) {
                    $objProducto = new Producto();
                    $objProducto->buscar($row2['idProducto']);
                    $array[] = $objProducto;
                }
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        return $array;
    }

    //INSERTAR
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;
        //Asigno los datos a variables
        $idProducto = $this->getIdProducto();
        $nombre = $this->getNombre();
        $descripcion = $this->getDescripcion();
        $precio = $this->getPrecio();
        $stock = $this->getStock();
        $tipo = $this->getTipo();
        $imagen = $this->getImagen();
        //Creo la consulta 
        $sql = "INSERT INTO producto (idProducto, nombre, descripcion, precio, stock, tipo) VALUES ('{$idProducto}', '{$nombre}', '{$descripcion}' , '{$precio}' , '{$stock}', , '{$tipo}', '{$imagen}')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        return $resp;
    }

    //MODIFICAR
    public function modificar()
    {
        $base = new BaseDatos();
        $resp = false;
        $idProducto = $this->getIdProducto();
        $nombre = $this->getNombre();
        $descripcion = $this->getDescripcion();
        $precio = $this->getPrecio();
        $stock = $this->getStock();
        $tipo = $this->getTipo();
        $imagen = $this->getImagen();
        $sql = "UPDATE producto SET nombre = '{$nombre}', descripcion = '{$descripcion}', precio = '{$precio} , stock = '{$stock} , tipo = '{$tipo}', imagen = '{$imagen}' WHERE idProducto = '{$idProducto}'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        return $resp;
    }

    //ELIMINAR
    public function eliminar()
    {
        $base = new BaseDatos();
        $rta = false;
        $consulta = "DELETE FROM producto WHERE idProducto = " . $this->getIdProducto();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $rta = true;
            } else {
                $this->setMensaje($base->getError());
            }
        } else {
            $this->setMensaje($base->getError());
        }
        return $rta;
    }

}