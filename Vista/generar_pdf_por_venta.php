<?php 
include('../Control/C_VentaProducto.php');
include('../Util/funciones.php');

$datos = data_submitted();

$obj_controlador = new C_VentaProducto();
$data = $obj_controlador->listar_productos_por_venta($datos['venta']);

$encabezado = '<td width="20" ><b>#</b></td>
                <td width="80"><b>Nombre</b></td>
                <td width="80"><b>Cantidad Disponible</b></td>
                <td width="200"><b>Descripcion</b></td>
                <td width="90"><b>Precio</b></td>
                ';                
                
$vista = '';
$vista = '<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<title>Productos Disponibles</title>
		<meta content="besto" name="description" />
		<meta content="" name="equipo_alfa_buena_onda" />
		<style>
            @import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
        </style>
	</head>
	
	<body style="font-family: "Open Sans", sans-serif; font-size: 9px !important; color: #333;">    	
    	<div style="width: 595px; font-size: 9px !important; font-family: "Open Sans", sans-serif;   ">
        
        <h1 style="font-size: 11px;"> 
        		Productos |  <small> De venta numero #'.$datos['venta'].' </small> 
        	   </h1>
           
    			<div>
    				<div style="font-size: 11px;">
    				   <table>
    				   	<tr>
    				   	    <td style="color:white">     				   	   
    				   	        <img  width="90px"  height="70px" src="http://localhost/TPInvestigacion/Vista/Assets/Img/logo_simple_pdf.jpg" />    				   	   
    				   	     </td>
    				   	    <td style="color:white"> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  </td>
    				   		<td style="text-align: right;color:#666;">'. date('d/m/Y').'</td>
    				   	</tr>
    				   </table>    					  					
    				</div>   
    		   </div>
               <div style="background-color: white;">                   
               <table style=" text-align: center;font-size: 7px !important; font-family: sans-serif;">
                   <tr style="background-color: #0083b0; color: #fff">                                 
                            '. $encabezado.'                    
                   </tr>    ';
                   $i = 1;
                   $cant_productos_listados = 1;
                   $primera_pagina=true;
                   $pagina = 1;
                   $height_fila =20;
                   foreach($data as $row){
                   $vista .= '<tr >';
                   $vista .= '<td height="'.$height_fila.'">' . $i . '</td>';
                   $vista .=  '<td height="'.$height_fila.'">' . $row->getNombre(). '</td>';
                   $vista .=  '<td height="'.$height_fila.'">' . $row->getStock() . '</td>';
                   $vista .=  '<td height="'.$height_fila.'">' . $row->getDescripcion() . '</td>';
                   $vista .=  '<td height="'.$height_fila.'">' . $row->getPrecio().'</td>';                              
                   $vista .=  '</tr>';
                   $i++;
                    
                    if($cant_productos_listados==15 && $primera_pagina==true){                            
                        $primera_pagina=false;
                        $cant_productos_listados=1;
                        $vista .=  '</table>';
                        $vista .=  '<h1 style="font-size: 8px ; margin-top: 0; text-align: center;color:#666;"> Pagina '.$pagina++.'</h1>';
                        $vista .= '<br pagebreak="true"/>';      
                        $vista .=  '<br/>';
                       
                        $vista .=  '<table style=" text-align: center;font-size: 7px !important; font-family: sans-serif;">';
                        $vista .=  '  <tr style="background-color: #0083b0; color: #fff">'.$encabezado.'</tr> ';    

                    }
                    elseif($primera_pagina==false && $cant_productos_listados==42){  
                        $cant_productos_listados=1;
                        $vista .=  '</table>';
                        $vista .=  '<h1 style="font-size: 8px; margin-top: 0; text-align: center;color:#666;"> Pagina '.$pagina++.'</h1>';
                        $vista .= '<br pagebreak="true"/>';
                        $vista .=  '<br/>';                              
                        $vista .=  '<table style=" text-align: center;font-size: 7px !important; font-family: sans-serif;">';
                        $vista .=  '<tr style="background-color: #0083b0; color: #fff">'.$encabezado.'</tr> ';
                    }
                    $cant_productos_listados++;
                 }                      
          $vista .=    ' </table>                
       </div>
       <div> ';
$vista .= '
        </div> 
    </body>
</html>';
include('../Biblioteca/Pdf.php');
$pdf = new Pdf();

echo $pdf->generar_y_descargar_pdf_informe('productos_por_venta', array(), $vista, $page_orientation = 'P', $output_type = 'I', $image_width = 32, $image_height = 32)
	
?>