<?php
include('Common/Header.php');
include('../Control/C_Venta.php');

$obj_controlador = new C_Venta();

$result = $obj_controlador->buscar(null);

?>
<div class="container text-center">
    <div class=" row bg-dark justify-content-center">
        <div class="container">
            <br/>
        <p><a target="_blank" href="generar_pdf_productos_disponibles.php" class="btn btn-primary">Descargar PDF de productos disponibles</a>
        | <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Generar PDF por Venta</a></p>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generar PDF por Venta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="from_pdf" name="from_pdf" method="post" action="generar_pdf_por_venta.php">
 
      <div class="modal-body">
     
      <select id="venta" name="venta" class="form-select" aria-label="Default select example">
      <?php
      foreach($result as $row){
        echo '<option value="'.$row->getIdVenta(). '">'.$row->getIdVenta().'</option>';
      }
      ?> 
      </select>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Generar PDF</button>
      </div>
      </form>
    </div>
  </div>
</div>



        </div>
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