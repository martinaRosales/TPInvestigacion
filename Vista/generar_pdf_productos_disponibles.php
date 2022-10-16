<?php
include('../Biblioteca/Pdf.php');
$pdf = new Pdf();

echo $pdf->generar_y_descargar_pdf_informe('prueba', array(), 'hola', $page_orientation = 'P', $output_type = 'I', $image_width = 32, $image_height = 32)
	
?>