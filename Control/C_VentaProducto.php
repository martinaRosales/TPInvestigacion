<?php

use function PHPSTORM_META\type;

include_once('../Modelo/VentaProducto.php');

class C_VentaProducto
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return VentaProducto
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idVentaProducto', $param)) {

            $obj = new VentaProducto();
            $obj->cargar(
                $param['idVentaProducto'],
                $param['idVenta'],
                $param['idProducto'],
                $param['cantidad']
            );
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de 
     * las variables instancias del objeto que son claves
     * @param array $param
     * @return Producto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idVentaProducto'])) {
            $obj = new VentaProducto();
            $obj->cargar($param['idVentaProducto'], null, null, null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idVentaProducto']))
            $resp = true;
        return $resp;
    }

    /**
     * Inserta un objeto
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        $obj = $this->cargarObjeto($param);
        if ($obj != null and $obj->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $obj = $this->cargarObjetoConClave($param);
            if ($obj != null and $obj->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $obj = $this->cargarObjeto($param);
            if ($obj != null && $obj->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            $where .= '';
            if (isset($param['idVentaProducto']))
                $where .= " and idVentaProducto ='" . $param['idVentaProducto'] . "'";
            if (isset($param['idVenta']))
                $where .= " and idVenta ='" . $param['idVenta'] . "'";
            if (isset($param['idProducto']))
                $where .= " and idProducto ='" . $param['idProducto'] . "'";
            if (isset($param['cantidad']))
                $where .= " and cantidad ='" . $param['cantidad'] . "'";
        }
        $obj = new VentaProducto();
        $arreglo =  $obj->listar($where);

        return $arreglo;
    }

    //Funciones para graficos. SI SUBI ESTO POR ERROR IGNORALO <3

    /**
     * Funcion que retorna la ganancia de una venta.
     * Debe buscar en la tabla VentaProducto todos los registros donde el idVenta que entra por parametro sea
     * igual al idVenta del registro y sumar todos los productos vendidos.
     * @param int $idVenta
     * @return int
     */
    private function gananciaVenta($idVenta)
    {
        $arrayVentaProducto = $this->buscar(NULL);
        $totalGanancia = 0;
        foreach ($arrayVentaProducto as $registro) {
            if ($registro->getObjVenta()->getIdVenta() == $idVenta) {
                //Creo instancia de C_Producto para obtener el precio
                $objC_Producto = new C_Producto();
                $objProducto = $objC_Producto->buscar(['idProducto' => $registro->getObjProducto()->getIdProducto()]);
                //Sumo al total de ganancias el precio del producto x cantidad vendida
                $totalGanancia += $registro->getCantidad() * $objProducto[0]->getPrecio();
            }
        }
        return $totalGanancia;
    }

    /**Funcion que retorna un arreglo asociativo de la forma ['mes'=>ganancia]*/
    public function gananciasPorMes()
    {
        //Obtengo todos los registros
        $array = $this->buscar(NULL);
        $arrayGanancias = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($array as $registro) {
            //Obtengo la fecha de la venta
            $objC_Venta = new C_Venta();
            $venta = $objC_Venta->buscar(['idVenta' => $registro->getObjVenta()->getIdVenta()])[0]; //El index 0 porque buscar retorna un array

            //echo get_class($venta);
            $fechaVenta = $venta->getFecha();
            $fechaComoEntero = strtotime($fechaVenta);
            $numMes = (int)date("m", $fechaComoEntero);
            //echo $numMes;
            //Agrego la ganancia de la venta en la posicion del array correspondiente al mes
            $idVenta = (int)$registro->getObjVenta()->getIdVenta();
            //echo $idVenta;
            $gananciaVenta = $this->gananciaVenta($registro->getObjVenta()->getIdVenta());
            $arrayGanancias[$numMes - 1] += $gananciaVenta;
        }
        //print_r($arrayGanancias);
        return $arrayGanancias;
    }

    /**
     * Recibe el ID de un producto y retorna cuantas veces se vendio
     */
    public function cantidadVendidaTotal($idProducto){
        $array = $this->buscar(NULL);
        $ventasConProducto = $this->buscar(['idProducto'=>$idProducto]);
        //print_r($ventasConProducto);
        $cantidadVendida = 0;
        foreach ((array)$ventasConProducto as $registro){
            $cantidadVendida += $registro->getCantidad();
        }
        return $cantidadVendida;
    }

    public function cantProductosVendidos(){
        $objC_Producto = new C_Producto();
        $arrayProductos = $objC_Producto->buscar(NULL);
        $arrayCantProductos = [];
        foreach($arrayProductos as $producto){
            //$producto = $registro->getObjProducto();
            $arrayCantProductos[] = ['nombre'=>$producto->getNombre(), 'cantidad'=>$this->cantidadVendidaTotal($producto->getIdProducto())];
        }
        return $arrayCantProductos;
    }
}
