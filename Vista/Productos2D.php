<?php
include_once("Common/Header.php");
$objControlProducto = new C_Producto();
$param =['tipo' => "'2D'"];
$arrayProductos = $objControlProducto->buscar($param);
if ($arrayProductos != null) {
    $cantidadProductos = count($arrayProductos);
} else {
    $cantidadProductos = -1;
}
$i = 0;
?>
<div class="container col-md-5 mt-3 ms-3">
    <div>
        <div>
        <?php
        while ($i < $cantidadProductos) {
        ?>
            <div>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="<?php echo $arrayProductos[$i]->getImagen() ?>" class="img-fluid rounded-start" alt="Foto del producto">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $arrayProductos[$i]->getNombre() ?></h5>
                                <p class="card-text"><b>Descripci&oacute;n:</b> <?php echo $arrayProductos[$i]->getDescripcion() ?> <br>
                                                     <b>Precio:</b>  $<?php echo $arrayProductos[$i]->getPrecio() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $i++;
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once("Common/Footer.php");
?>