<?php
include('Common/Header.php');
include('../Control/C_Venta.php');

$obj_controlador = new C_Venta();

$result = $obj_controlador->buscar(null);

?>
<div class="container text-center">
  <div class=" row bg-dark justify-content-center">
    <div class="container">
      <br />
      <p><a target="_blank" href="generar_pdf_productos_disponibles.php" class="btn btn-primary">Descargar PDF de productos disponibles</a>
        | <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Generar PDF por Venta</a>
        | <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_pdf_montos">Generar PDF por Montos</a></p>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Generar PDF por Venta</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form target="_blank" id="from_pdf" name="from_pdf" method="post" action="generar_pdf_por_venta.php">

              <div class="modal-body">

                <select id="venta" name="venta" class="form-select" aria-label="Default select example">
                  <?php
                  foreach ($result as $row) {
                    echo '<option value="' . $row->getIdVenta() . '">' . $row->getIdVenta() . '</option>';
                  }
                  ?>
                </select>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Generar PDF</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="Modal_pdf_montos" tabindex="-1" aria-labelledby="Modal_pdf_montos" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id=Modal_pdf_montosLabel">Generar PDF por Montos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  target="_blank" id="from_pdf_montos" name="from_pdf_montos" method="post" action="generar_pdf_por_montos.php">
 
      <div class="modal-body">
      <div class="row">
      <div class="col-xs-12 col-md-12">
      <div class="form-group">
        <label for="">Ingrese los montos</label>
        <br/>
        <div class="input-group">
          <input name="monto_min" id="monto_min" type="number" required class="form-control" placeholder="Monto Minimo">
          
          <input name="monto_max" id="monto_max" type="text" required class="form-control" placeholder="Monto Maximo">
        </div>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Generar PDF</button>
      </div>
      </form>
    </div>
  </div>
                </div>
    </div>
      <div class="container col-4">
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
      <div class="container col-4">
        <h2 class="text-light">Como nos conocieron</h2>
        <!-- <button class="btn btn-primary" onClick="mostrarGrafico('PopularidadProductos');">Ver</button>
            <p></p> -->
        <?php include_once('GraficoSalchicha.php') ?>
      </div>
      <div class="container col-8">
        <h2 class="text-light">Sucursales</h2></h2>
        <!-- <button class="btn btn-primary" onClick="mostrarGrafico('PopularidadProductos');">Ver</button>
            <p></p> -->
        <?php include_once('GraficoSucursales.php') ?>
      </div>

    </div>
  </div>


  <script src="Assets/Js/VerGraficos.js"></script>