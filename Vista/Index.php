<?php
include_once("Common/Header.php");
$objControlProducto = new C_Producto();
$arrayProductos = $objControlProducto->buscar(NULL);
if ($arrayProductos != null) {
    $cantidadProductos = count($arrayProductos);
} else {
    $cantidadProductos = -1;
}
$i = 0;
?>
<div>
    <?php
    while ($i < $cantidadProductos) {

    ?>
        <div>
            <?php echo $arrayProductos[$i]->getNombre() ?>
        </div>
    <?php
        $i++;
    }
    ?>
</div>

<?php
include_once("Common/Footer.php");
?>