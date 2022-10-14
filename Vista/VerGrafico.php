<?php
include('Common/Header.php');

?>

<div class="container">
<h2 class="text-light">Ganancias Mensuales</h2>
<button class="btn btn-primary" onclick="mostrarGrafico('VentasMensuales')">Ver</button>
    <?php include_once('GraficoVentasMensuales.php') ?>
</div>