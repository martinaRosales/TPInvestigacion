<?php
include_once("Common/Header.php");
?>

<div class="container " style="margin:30px;height:150vh; position:relative;">
<div class="display-1 text-light" id="titulo"><h1>¡Bienvenidxs al cat&aacute;logo Besto3D!</h1></div>
<div class="container" id="contIndex" >
<div id="carouselExampleIndicators" class="carousel slide start-50 translate-middle-x" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>

  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Assets/Img/Index/perfil.jpg" id="imagenCarousel" class="d-block w-100" alt="Logo de Besto3D">
    </div>
    <div class="carousel-item">
      <img src="Assets/Img/Index/Slide 2.jpeg" id="imagenCarousel" class="d-block w-100" alt="Imagen del stand">
    </div>
    <div class="carousel-item">
      <img src="Assets/Img/Index/Slide 3.jpg" id="imagenCarousel" class="d-block w-100" alt="Foto cosplay de Besto Anto y Besto Marti">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<div id="librerias" class="text-light col-9 ms-2 mb-2" >
    Las librer&iacute;as utilizadas para este trabajo fueron Amcharts y TCPDF <br>
<img src="Assets/Img/Index/logoAmcharts.png" id="logo"/>
<img src="Assets/Img/Index/logoPdf.png" id="logo"/>
</div>

</div>

<?php
include_once("Common/Footer.php");
?>