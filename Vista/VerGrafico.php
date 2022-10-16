<?php
include('Common/Header.php');

?>
<div class="container col-md-12 mt-3 ms-3">
<p><a href="generar_pdf_productos_disponibles" class="btn btn-primary">Descargar PDF de productos disponibles</a></p>
<form action="" id="verGraficos">
    <div class="container">
        <h2 class="text-light">Ganancias Mensuales</h2>
        <button class="btn btn-primary" onClick="mostrarGrafico('VentasMensuales');">Ver</button>
        <p></p>
        <?php include_once('GraficoVentasMensuales.php') ?>
    </div>

    <div class="container">
        <h2 class="text-light">Popularidad de productos</h2>
        <button class="btn btn-primary" onClick="mostrarGrafico('PopularidadProductos');">Ver</button>
        <p></p>
        <?php include_once('GraficoPopularidadProductos.php') ?>
    </div>

</form>
<script src="Assets/Js/VerGraficos.js"></script>