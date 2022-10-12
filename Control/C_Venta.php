<?php
include_once '../Modelo/Venta.php';

class C_Venta
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los idVentas de las variables instancias del objeto
     * @param array $param
     * @return Venta
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idVenta', $param)) {

            $obj = new Venta();
            $obj->cargar(
                $param['idVenta'],
                $param['fecha']
            );
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los idVentas de 
     * las variables instancias del objeto que son claves
     * @param array $param
     * @return Producto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idVenta'])) {
            $obj = new Venta();
            $obj->cargar($param['idVenta'], null, null, null, null, null);
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
        if (isset($param['idVenta']))
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
            if  (isset($param['idVenta']))
                $where.=" and idVenta ='".$param['idVenta']."'"; 
            if  (isset($param['fecha']))
                    $where.=" and fecha ='".$param['fecha']."'";
        }
        $obj = new Venta();
        $arreglo =  $obj->listar($where);  
        
        return $arreglo;
    }
}
