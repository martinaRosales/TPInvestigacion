<?php
include 'conector/BaseDeDatos.php';
class VentaProducto{
    private $objVenta; //Referencia a objeto Venta
    private $objProducto; //Referencia a objeto Producto
    private $cantidad;
    private $mensaje;

    public function __construct()
    {
        $this->objProducto = '';
        $this->objVenta = '';
        $this->cantidad = '';
    }

    public function cargar($venta, $producto, $cantidad){
        $this->setObjProducto($producto);
        $this->setObjVenta($venta);
        $this->setCantidad($cantidad);
    }

    public function getObjVenta(){
        return $this->objVenta;
    }

    public function setObjVenta($objVenta){
        $this->objVenta = $objVenta;
    }

    public function getObjProducto(){
        return $this->objProducto;
    }

    public function setObjProducto($objProducto){
        $this->objProducto = $objProducto;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function setMensaje($mensaje){
        $this->mensaje = $mensaje;
    }

    public function __toString()
    {
        return "Venta: " . $this->getObjVenta() .
            "\Producto: " . $this->getObjProducto() .
            "\Cantidad: " . $this->getCantidad();
    }

    
    
}