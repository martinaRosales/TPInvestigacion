<?php
include('Common/Header.php');

?>
<div class="container text-center">
    <div class=" row bg-dark justify-content-center">
        <p><a target="_blank" href="generar_pdf_productos_disponibles.php" class="btn btn-primary">Descargar PDF de productos disponibles</a></p>

        <div class="container col">
            <h2 class="text-light">Ganancias Mensuales</h2>
            <!-- <button class="btn btn-primary" onClick="mostrarGrafico('VentasMensuales');">Ver</button>
            <p></p> -->
            <?php include_once('GraficoVentasMensuales.php') ?>
        </div>

        <div class="container col-8">
            <h2 class="text-light">Popularidad de productos</h2>
            <!-- <button class="btn btn-primary" onClick="mostrarGrafico('PopularidadProductos');">Ver</button>
            <p></p> -->
            <?php include_once('GraficoPopularidadProductos.php') ?>
        </div>

    </div>
</div>
    

    <script src="Assets/Js/VerGraficos.js"></script>