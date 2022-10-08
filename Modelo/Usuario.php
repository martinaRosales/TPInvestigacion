<?php
include_once 'conector/BaseDeDatos.php';
class Usuario
{
    private $nombre;
    private $contrasenia;
    private $tipoCuenta;
    private $mensaje;

    public function __construct()
    {
        $this->usuario = "";
        $this->contrasenia = "";
        $this->tipoCuenta = "";
    }

    public function cargar($nombre, $contrasenia, $tipoCuenta)
    {
        $this->setNombre($nombre);
        $this->setContrasenia($contrasenia);
        $this->setTipoCuenta($tipoCuenta);
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getContrasenia()
    {
        return $this->contrasenia;
    }
    public function getTipoCuenta()
    {
        return $this->tipoCuenta;
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }
    public function setTipoCuenta($tipoCuenta)
    {
        $this->tipoCuenta = $tipoCuenta;
    }
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() .
            "\nContrasenia: " . $this->getContrasenia() .
            "\nTipo de cuenta: " . $this->getTipoCuenta();
    }

    //FUNCIONES BD
    //BUSCAR
    public function buscar($nombre)
    {
        $base = new BaseDatos();
        $resp = false;
        $sql = "SELECT * FROM usuario WHERE nombre = '" . $nombre . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($row2 = $base->Registro()) {
                    $this->setNombre($row2['nombre']);
                    $this->setContrasenia($row2['contrasenia']);
                    $this->setTipoCuenta($row2['tipoCuenta']);
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
        $sql =  "select * from usuario";
        if ($condicion != '') {
            $sql = $sql . ' where ' . $condicion;
        }
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $array = array();
                while ($row2 = $base->Registro()) {
                    $objUsuario = new Usuario();
                    $objUsuario->buscar($row2['nombre']);
                    $array[] = $objUsuario;
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
        $nombre = $this->getNombre();
        $contrasenia = $this->getContrasenia();
        $tipoCuenta = $this->getTipoCuenta();
        //Creo la consulta 
        $sql = "INSERT INTO usuario (nombre, contrasenia, tipoCuenta) VALUES ('{$nombre}', '{$contrasenia}', '{$tipoCuenta}')";
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
        $nombre = $this->getNombre();
        $contrasenia = $this->getContrasenia();
        $tipoCuenta = $this->getTipoCuenta();

        $sql = "UPDATE usuario SET contrasenia = '{$contrasenia}', tipoCuenta = '{$tipoCuenta}' WHERE nombre = '{$nombre}'";
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
        $consulta = "DELETE FROM usuario WHERE nombre = " . $this->getNombre();
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
