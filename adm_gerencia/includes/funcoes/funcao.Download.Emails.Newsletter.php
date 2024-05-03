<?php
	include_once("../Conexao.php");
	
	$_query = mysqli_query($link, "SELECT * FROM tb_newsletter");
	
	if (mysqli_num_rows($_query)>0){
		$_table = "<table>";
		
		while($_dados = mysqli_fetch_array($_query)){
			$_table .= "<tr>";
			$_table .= "<td>" . $_dados["nome"] . "</td>";
			$_table .= "<td>" . $_dados["telefone"] . "</td>";
			$_table .= "<td>" . $_dados["email"] . "</td>";
			$_table .= "</tr>";
		}
		
		$_table .= "</table>";
		
		// header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		// header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"emails_" . date("d-m-Y_h-i-s") . ".xls\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $_table;
	}
?>