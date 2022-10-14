<?php
include('Common/Header.php');

?>

<div class="container">
    <h2 class="text-light">Ganancias Mensuales</h2>
    <button class="btn btn-primary" onClick="mostrarGrafico('VentasMensuales');">Ver</button>
    <?php include_once('GraficoVentasMensuales.php') ?>
</div>

<div class="container">
    <h2 class="text-light">Ganancias Mensuales</h2>
    <button class="btn btn-primary" onClick="mostrarGrafico('PopularidadProductos');">Ver</button>
    <?php include_once('GraficoPopularidadProductos.php') ?>
</div>

<script src="Assets/Js/VerGraficos.js"></script>