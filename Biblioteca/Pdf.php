<?php

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
	function __construct()
	{
		parent::__construct();
	}

	protected function _trim_print_string($value)
	{
		$value = str_replace(array("&nbsp;", "&amp;", "&gt;", "&lt;"), array(" ", "&", ">", "<"), $value);

		//If the value has only spaces and nothing more then add the whitespace html character
		if (str_replace(" ", "", $value) == "")
			$value = "&nbsp;";

		return strip_tags($value);
	}

	public function get_styles()
	{
		return '<meta charset=\"utf-8\" /><style>
			    h1 {
			       font-family: "Open Sans";
			        font-size: 14pt;
			        text-transform: uppercase!important;
			    }
			    p.first {
			        color: #333;
			     	font-family: "Open Sans";
			        font-size: 10pt;
			        text-align: justify;
			    }
			    p.first span {
			        color: #333;
			      font-family: "Open Sans";
			       font-size: 10pt;
			    }		   
			   
			    .lowercase {
			        text-transform: lowercase;
			    }
			    .uppercase {
			        text-transform: uppercase;
			    }
			    .capitalize {
			        text-transform: capitalize;
			    }
    			
    			
    			
				</style>';
	}

	public function get_title($title)
	{
		return '<h1 class="title"><i style="color:#32c5d2">' . $title . '</i></h1>';
	}

	public function get_paragraph($text)
	{

		return '<p class="first">' . $text . '</p>';
	}

	public function generar_y_descargar_pdf_informe($nombre_archivo_sin_extension, $subject, $message, $page_orientation = 'P', $output_type = 'I')
	{
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->SetMargins(20, 3, 20, true);


		$string_to_print = $message;

		// add a page
		$pdf->AddPage($page_orientation, 'A4', true);

		$pdf->writeHTML($string_to_print, true, false, true, false, '');
		
		$pdf->Output($nombre_archivo_sin_extension . '.pdf', $output_type);
	}
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */