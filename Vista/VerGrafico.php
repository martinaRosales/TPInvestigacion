<?php
include('Common/Header.php');

?>
<form action="" id="verGraficos">
<div class="container">
    <h2 class="text-light">Ganancias Mensuales</h2>
    <button class="btn btn-primary" onClick="mostrarGrafico('VentasMensuales');">Ver</button>
    <?php include_once('GraficoVentasMensuales.php') ?>
</div>

<div class="container">
    <h2 class="text-light">Popularidad de productos</h2>
    <button class="btn btn-primary" onClick="mostrarGrafico('PopularidadProductos');">Ver</button>
    <?php include_once('GraficoPopularidadProductos.php') ?>
</div>

<button class="btn btn-primary">Descargar PDF</button>
</form>
<script src="Assets/Js/VerGraficos.js"></script>