<?php
include_once 'conector/BaseDeDatos.php';
class Venta
{
    private $idVenta;
    private $fecha;
    private $mensaje;

    public function __construct()
    {
        $this->idVenta = '';
        $this->fecha = '';
    }

    public function cargar($idVenta, $fecha)
    {
        $this->setIdVenta($idVenta);
        $this->setFecha($fecha);
    }

    public function getIdVenta()
    {
        return $this->idVenta;
    }

    public function setIdVenta($idVenta)
    {
        $this->idVenta = $idVenta;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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
        return "Id Venta: " . $this->getIdVenta() . "
        Fecha: " . $this->getFecha();
    }

    //FUNCIONES DE BASE DE DATOS
    //BUSCAR
    public function buscar($idVenta)
    {
        $base = new BaseDatos();
        $resp = false;
        $sql = "SELECT * FROM venta WHERE idVenta = '" . $idVenta . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($row2 = $base->Registro()) {
                    $this->setIdVenta($row2['idVenta']);
                    $this->setFecha($row2['fecha']);
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
        $sql =  "select * from venta";
        if ($condicion != '') {
            $sql = $sql . ' where ' . $condicion;
        }
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $array = array();
                while ($row2 = $base->Registro()) {
                    $objVenta = new Venta();
                    $objVenta->buscar($row2['idVenta']);
                    $array[] = $objVenta;
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
        $idVenta = $this->getIdVenta();
        $fecha = $this->getFecha();
        //Creo la consulta 
        $sql = "INSERT INTO venta (idVenta, fecha) VALUES ('{$idVenta}', '{$fecha}')";
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
        $idVenta = $this->getIdVenta();
        $fecha = $this->getFecha();

        $sql = "UPDATE venta SET fecha = '{$fecha}' WHERE idVenta = '{$idVenta}'";
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
        $consulta = "DELETE FROM venta WHERE idVenta = " . $this->getIdVenta();
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
