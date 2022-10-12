<?php
include_once '../Modelo/Producto.php';

class C_Producto
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Producto
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('Patente', $param)) {

            $obj = new Producto();
            $obj->cargar(
                $param['idProducto'],
                $param['nombre'],
                $param['descripcion'],
                $param['precio'],
                $param['tipo'],
                $param['stock']
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
        if (isset($param['id'])) {
            $obj = new Producto();
            $obj->cargar($param['idProducto'], null, null, null, null, null);
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
        if (isset($param['idProducto']))
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
            if  (isset($param['idProducto']))
                $where.=" and idProducto ='".$param['idProducto']."'"; 
            if  (isset($param['nombre']))
                    $where.=" and nombre ='".$param['nombre']."'";
            if  (isset($param['descripcion']))
                    $where.=" and descripcion ='".$param['descripcion'] ."'";
            if  (isset($param['precio']))
                    $where.=" and precio =".$param['precio'];
            if  (isset($param['tipo']))
                    $where.=" and tipo =".$param['tipo'];
            if  (isset($param['stock']))
                    $where.=" and stock =".$param['stock'];
        }
        $obj = new Producto();
        $arreglo =  $obj->listar($where);  
        
        return $arreglo;
    }
}
