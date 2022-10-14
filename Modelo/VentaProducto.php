<?php
include_once 'conector/BaseDeDatos.php';
class VentaProducto
{
    private $idVentaProducto;
    private $objVenta; //Referencia a objeto Venta
    private $objProducto; //Referencia a objeto Producto
    private $cantidad;
    private $mensaje;

    public function __construct()
    {
        $this->idVentaProducto = '';
        $this->objProducto = '';
        $this->objVenta = '';
        $this->cantidad = '';
    }

    public function cargar($idVentaProducto, $venta, $producto, $cantidad)
    {
        $this->setIdVentaProducto($idVentaProducto);
        $this->setObjProducto($producto);
        $this->setObjVenta($venta);
        $this->setCantidad($cantidad);
    }

    public function getObjVenta()
    {
        return $this->objVenta;
    }

    public function setObjVenta($objVenta)
    {
        $this->objVenta = $objVenta;
    }

    public function getObjProducto()
    {
        return $this->objProducto;
    }

    public function setObjProducto($objProducto)
    {
        $this->objProducto = $objProducto;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getIdVentaProducto()
    {
        return $this->idVentaProducto;
    }

    public function setIdVentaProducto($idVentaProducto)
    {
        $this->idVentaProducto = $idVentaProducto;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function __toString()
    {
        return "ID VentaProducto: " . $this->getIdVentaProducto() .
            "\nVenta: " . $this->getObjVenta() .
            "\nProducto: " . $this->getObjProducto() .
            "\nCantidad: " . $this->getCantidad();
    }

    //Funciones BD

    //BUSCAR
    public function buscar($id)
    {
        $base = new BaseDatos();
        $resp = false;
        $sql = "SELECT * FROM ventaproducto WHERE idVentaProducto = '" . $id . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($row2 = $base->Registro()) {
                    $this->setIdVentaProducto($row2['idVentaProducto']);
                    $this->setCantidad($row2['cantidad']);
                    //Creo un objeto producto para buscar al id y setear el objeto
                    $producto = new Producto();
                    $producto->buscar($row2['idProducto']);
                    $this->setObjProducto($producto);

                    //Igual para la venta
                    $venta = new Venta();
                    $venta->buscar($row2['idVenta']);
                    $this->setObjVenta($venta);
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
        $sql =  "select * from ventaproducto";
        if ($condicion != '') {
            $sql = $sql . ' where ' . $condicion;
        }
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $array = array();
                while ($row2 = $base->Registro()) {
                    $obVentaProducto = new VentaProducto();
                    $obVentaProducto->buscar($row2['idVentaProducto']);
                    $array[] = $obVentaProducto;
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
        $idVentaProducto = $this->getIdVentaProducto();
        $producto = $this->getObjProducto();
        $idProducto = $producto->getIdProducto();
        $venta = $this->getObjVenta();
        $idVenta = $venta->getIdVenta();
        $cantidad = $this->getCantidad();
        //Creo la consulta 
        $sql = "INSERT INTO ventaproducto (idVentaProducto, idVenta, idProducto, cantidad) VALUES ('{$idVentaProducto}', '{$idVenta}'. '{$idProducto}', '{$cantidad}')";
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
        $idVentaProducto = $this->getIdVentaProducto();
        $producto = $this->getObjProducto();
        $idProducto = $producto->getIdProducto();
        $venta = $this->getObjVenta();
        $idVenta = $venta->getIdVenta();
        $cantidad = $this->getCantidad();
        $sql = "UPDATE ventaproducto SET idVenta = '{$idVenta}', idProducto = '{$idProducto}', cantidad = '{$cantidad}' WHERE idVentaProducto = '{$idVentaProducto}'";
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
        $consulta = "DELETE FROM ventaproducto WHERE idVentaProducto = " . $this->getIdVentaProducto();
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
