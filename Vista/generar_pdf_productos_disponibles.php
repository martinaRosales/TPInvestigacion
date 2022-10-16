<?php 
include('../Control/C_Producto.php');
$obj_controlador = new C_Producto();
$data = $obj_controlador->productos_disponibles();
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
        		Productos |  <small> Disponibles </small> 
        	   </h1>
           
    			<div>
    				<div style="font-size: 11px;">
    				   <table>
    				   	<tr>
    				   	    <td style="color:white">     				   	   
    				   	        <img  width="70px"  height="70px" src="data:image/jpeg;base64,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" />    				   	   
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

echo $pdf->generar_y_descargar_pdf_informe('prueba', array(), $vista, $page_orientation = 'P', $output_type = 'I', $image_width = 32, $image_height = 32)
	
?>