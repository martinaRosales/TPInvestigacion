<?php
include_once '../Modelo/VentaProducto.php';

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
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $obj= $this->cargarObjeto($param);
            if($obj!=null && $obj->modificar()){
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
    public function buscar($param){
        $where = " true "; 
        if ($param<>NULL){
            $where .= '';
            if  (isset($param['idVentaProducto']))
                $where.=" and idVentaProducto ='".$param['idVentaProducto']."'"; 
            if  (isset($param['idVenta']))
                    $where.=" and idVenta ='".$param['idVenta']."'";
            if  (isset($param['idProducto']))
                    $where.=" and idProducto ='".$param['idProducto'] ."'";
            if  (isset($param['cantidad']))
                    $where.=" and cantidad ='".$param['cantidad'] ."'";
        }
        $obj = new VentaProducto();
        $arreglo =  $obj->listar($where);  
        
        return $arreglo;
    }
}
