<?php

	include_once("../Conexao.php");

	

	$_query = mysqli_query($link, "SELECT * FROM tb_estatisticas ORDER BY data DESC");

	

	if (mysqli_num_rows($_query)>0){

		$_table = "<table>";
		$_table .= "<tr>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>IP</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>NAVEGADOR</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>IDIOMA</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>FUSO HORARIO</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>SISTEMA OPERACIONAL</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>DIA DA SEMANA</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>DATA</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>LATITUDE</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>LONGITUDE</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>CIDADE</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>ESTADO</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>PAIS</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>REFERENCIA</td>";
		$_table .= "<td bgcolor='#000' style='color:#ffffff; padding:5px; text-align:center; background:#000'>PAGINA</td>";
		$_table .= "</tr>";

		

		while($_dados = mysqli_fetch_array($_query)){

			$_table .= "<tr>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["ip"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["navegador"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["idioma"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["fuso_horario"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["OS"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["dia_semana"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["data"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["latitude"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["longitude"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["cidade"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["estado"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["pais"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["referencia"] . "</td>";
			$_table .= "<td style='padding:5px; text-align:center'>" . $_dados["pagina"] . "</td>";
			$_table .= "</tr>";

		}

		

		$_table .= "</table>";

		

		// header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

		// header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");

		header ("Cache-Control: no-cache, must-revalidate");

		header ("Pragma: no-cache");

		header ("Content-type: application/x-msexcel");

		header ("Content-Disposition: attachment; filename=\"estatisticas_" . date("d-m-Y_h-i-s") . ".xls\"" );

		header ("Content-Description: PHP Generated Data" );

		// Envia o conteúdo do arquivo

		echo $_table;

	}

?>