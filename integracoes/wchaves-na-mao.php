<?php
	include_once("../adm_gerencia/includes/Conexao.php");
	header("Content-Type: application/xml; charset=utf-8");
	echo '<?xml version="1.0" encoding="utf-8"?>';

	$hoje = date('Y-m-d H:i:s');
	
	// Função para Remover os Caracteres Especiais em Html
	$arrayCaracteresEspeciaisHtml1 = array
	(
		"&deg;", "&ordm;", "&acute;", "&sup2;", "&#13;", "&uacute;", "&ccedil;", "üã", "&Aacute;", "&aacute;", "&Acirc;", "&acirc;", "&Agrave;", "&agrave;", "&Aring;", "&aring;", "&Atilde;", "&atilde;", "&Auml;", "&auml;", "&AElig;", "&aelig;", 
		"&Eacute;", "&eacute;", "&Ecirc;", "&ecirc;", "&Egrave;", "&egrave;", "&Euml;", "&euml;", "&ETH;", "&eth;", "&Iacute;", "&iacute;", "&Icirc;", "&icirc;",  
		"&Igrave;", "&igrave;", "&Iuml;", "&iuml;", "&Oacute;", "&oacute;", "&Ocirc;", "&ocirc;", "&Ograve;", "&ograve;", "&Oslash;", "&oslash;", "&Otilde;", "&otilde;", 
		"&Uacute;", "&uacute;", "&Ucirc;", "&ucirc;", "&Ugrave;", "&ugrave;", "&Uuml;", "&uuml;", "&Ccedil;", "&ccedil;", "&Ntilde;", "&ntilde;", "&lt;", "&gt;", "&amp;",
		"&Ouml;", "&ouml;", "&quot;", "&reg;", "&copy;", "&Yacute;", "&yacute;", "&THORN;", "&thorn;", "&szlig;", "&nbsp;", "\n", "  ", "
		"
	);		 
	$arrayCaracteresEspeciaisHtml2 = array
	(
		"º", "º", "'", "²", "", "ú", "ç", "ç", "Á", "á", "Â", "â", "À", "à", "Å", "å", "Ã", "ã", "Ä", "ä", "Æ", "æ", 
		"É", "é", "Ê", "ê", "È", "è", "Ë", "ë", "Ð", "ð", "Í", "í", "Î", "î", 
		"Ì", "ì", "Ï", "ï", "Ó", "ó", "Ô", "ô", "Ò", "ò", "Ø", "ø", "Õ", "õ", "Ö;", "ö", 
		"Ú", "ú", "Û", "û", "Ù;", "ù", "Ü", "ü", "Ç", "ç", "Ñ", "ñ", "<", ">", "&",
		'"', "®", "©", "Ý", "ý", "Þ;", "þ", "ß", " ", "", " ", ""
	);
?>
<Document>
    <imoveis>
        <?php
			$_sql = mysqli_query($link, "SELECT * FROM tb_imoveis_anuncios WHERE status='S' AND integracao_chaves_na_mao='S'");
			while($_dados = mysqli_fetch_array($_sql)){
		?>
        <!-- IMÓVEL <?php echo $_dados['id'];?> -->
        <imovel>
            <?php
				if(!empty($_dados['referencia'])){
			?>
            <referencia>
				<?php echo utf8_encode($_dados['referencia']);?>
            </referencia>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['url_amigavel'])){
			?>
            <link_cliente>
				<?php echo $_linkCompleto;?>/imovel/<?php echo $_dados['id'];?>/detalhes/<?php echo $_dados['url_amigavel'];?>/referencia/<?php echo $_dados['referencia'];?>
            </link_cliente>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['nome'])){
			?>
            <titulo>
				<?php echo utf8_encode($_dados['nome']);?>
            </titulo>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['id_transacao'])){
			?>
            <transacao>
            	<?php 				
					$sql_Transacao   = mysqli_query($link, "SELECT * FROM tb_imoveis_transacao WHERE id='".$_dados['id_transacao']."'");
					$dados_Transacao = mysqli_fetch_array($sql_Transacao);
					switch ($dados_Transacao['id'])
					{
					case 1:
						echo "V";
						break;
					case 2:
						echo "L";
						break;
					default:
						echo utf8_encode($dados_Transacao['nome']);
					}
				?>
            </transacao>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['id_finalidade'])){
			?>
            <finalidade>
            	<?php 				
					$sql_Finalidade   = mysqli_query($link, "SELECT * FROM tb_imoveis_finalidade WHERE id='".$_dados['id_finalidade']."'");
					$dados_Finalidade = mysqli_fetch_array($sql_Finalidade);
					switch ($dados_Finalidade['id'])
					{
					case 1:
						echo "RE";
						break;
					case 2:
						echo "CO";
						break;
					case 2:
						echo "RU";
						break;
					default:
						echo utf8_encode($dados_Finalidade['nome']);
					}
				?>
            </finalidade>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['destaque'])){
			?>
            <destaque>
            	<?php
					switch ($_dados['destaque']) {
						case 'S':
							echo "1";
							break;
						case 'N':
							echo "0";
							break;
					}
				?>
            </destaque>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['id_tipo'])){
			?>
            <tipo>
            	<?php 				
					$sql_Tipos   = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE id='".$_dados['id_tipo']."'");
					$dados_Tipos = mysqli_fetch_array($sql_Tipos);
					echo utf8_encode($dados_Tipos['nome']);
				?>
            </tipo>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['preco'])){
			?>
            <valor>
            	<?php echo $_dados['preco'];?>
            </valor>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['preco_iptu'])){
			?>
            <valor_iptu>
            	<?php echo $_dados['preco_iptu'];?>
            </valor_iptu>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['preco_condominio'])){
			?>
            <valor_condominio>
            	<?php echo $_dados['preco_condominio'];?>
            </valor_condominio>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['tamanho_area_total'])){
			?>
            <area_total>
            	<?php echo $_dados['tamanho_area_total'];?>
            </area_total>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['tamanho_area_construida'])){
			?>
            <area_util>
            	<?php echo $_dados['tamanho_area_construida'];?>
            </area_util>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_quartos'])){
			?>
            <quartos>
            	<?php echo $_dados['dependencias_quartos'];?>
            </quartos>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_suites'])){
			?>
            <suites>
            	<?php echo $_dados['dependencias_suites'];?>
            </suites>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_garagem'])){
			?>
            <garagem>
            	<?php echo $_dados['dependencias_garagem'];?>
            </garagem>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_banheiro'])){
			?>
            <banheiro>
            	<?php echo $_dados['dependencias_banheiro'];?>
            </banheiro>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_closet'])){
			?>
            <closet>
            	<?php echo $_dados['dependencias_closet'];?>
            </closet>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_salas'])){
			?>
            <salas>
            	<?php echo $_dados['dependencias_salas'];?>
            </salas>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_despensa'])){
			?>
            <despensa>
            	<?php echo $_dados['dependencias_despensa'];?>
            </despensa>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_bar'])){
			?>
            <bar>
            	<?php echo $_dados['dependencias_bar'];?>
            </bar>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_cozinha'])){
			?>
            <cozinha>
            	<?php echo $_dados['dependencias_cozinha'];?>
            </cozinha>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_quarto_empregada'])){
			?>
            <quarto_empregada>
            	<?php echo $_dados['dependencias_quarto_empregada'];?>
            </quarto_empregada>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_escritorio'])){
			?>
            <escritorio>
            	<?php echo $_dados['dependencias_escritorio'];?>
            </escritorio>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_area_servico'])){
			?>
            <area_servico>
            	<?php echo $_dados['dependencias_area_servico'];?>
            </area_servico>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_lareira'])){
			?>
            <lareira>
            	<?php echo $_dados['dependencias_lareira'];?>
            </lareira>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_varanda'])){
			?>
            <varanda>
            	<?php echo $_dados['dependencias_varanda'];?>
            </varanda>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_lavanderia'])){
			?>
            <lavanderia>
            	<?php echo $_dados['dependencias_lavanderia'];?>
            </lavanderia>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_areaservico'])){
			?>
            <area_servico>
            	<?php echo utf8_encode($_dados['dependencias_areaservico']);?>
            </area_servico>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['estado'])){
			?>
            <estado>
            	<?php echo utf8_encode($_dados['estado']);?>
            </estado>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['id_cidade'])){
			?>
            <cidade>
            	<?php 				
					$sql_Cidade   = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE id='".$_dados['id_cidade']."'");
					$dados_Cidade = mysqli_fetch_array($sql_Cidade);
					echo utf8_encode($dados_Cidade['nome']);
				?>
            </cidade>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['id_bairro'])){
			?>
            <bairro>
            	<?php 				
					$sql_Bairro   = mysqli_query($link, "SELECT * FROM tb_imoveis_bairros WHERE id='".$_dados['id_bairro']."'");
					$dados_Bairro = mysqli_fetch_array($sql_Bairro);
					echo utf8_encode($dados_Bairro['nome']);
				?>
            </bairro>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['cep'])){
			?>
            <cep>
            	<?php echo utf8_encode($_dados['cep']);?>
            </cep>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['endereco'])){
			?>
            <endereco>
            	<?php echo utf8_encode($_dados['endereco']);?>
            </endereco>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['numero'])){
			?>
            <numero>
            	<?php echo utf8_encode($_dados['numero']);?>
            </numero>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['complemento'])){
			?>
            <complemento>
            	<?php echo utf8_encode($_dados['complemento']);?>
            </complemento>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['descricao'])){
			?>
            <descritivo>
            	<?php 
					$texto = utf8_encode($_dados['descricao']);
					$texto = str_replace($arrayCaracteresEspeciaisHtml1, $arrayCaracteresEspeciaisHtml2, $texto);
					$texto = str_replace("&bull","",$texto); 
					$texto = str_replace("</p>","<br><br>",$texto);
					$texto = str_replace("<br>","<br/>",$texto);
					$texto = strip_tags($texto,'<br/><br>'); 
					$texto = str_replace("<br/>","\n",$texto);
					echo $texto;
                ?>
            </descritivo>
            <?php
				}
			?>
            <fotos_imovel>
            	<foto>
            		<url><?php echo $_linkCompleto;?>/assets/uploads/tb_imoveis_anuncios/<?php echo $_dados['id']."/".$_dados['foto'];?></url>
            		<data_atualizacao><?php echo date("Y-m-d H:i:s", strtotime($_dados['data_edicao']));?></data_atualizacao>
            	</foto>
                <?php
					$_sql_Foto = mysqli_query($link, "SELECT * FROM tb_imoveis_fotos WHERE id_registro='".$_dados['id']."'");
					while($_dados_Foto = mysqli_fetch_array($_sql_Foto)){
				?>
                <foto>
            		<url><?php echo $_linkCompleto;?>/assets/uploads/tb_imoveis_anuncios/<?php echo $_dados['id']."/".$_dados_Foto['foto'];?></url>
            		<data_atualizacao><?php echo date("Y-m-d H:i:s", strtotime($_dados_Foto['data_criacao']));?></data_atualizacao>
            	</foto>
                <?php
					}
				?> 
            </fotos_imovel>
            <data_atualizacao>
            	<?php echo date("Y-m-d H:i:s", strtotime($_dados['data_edicao']));?>
            </data_atualizacao>
            <?php
				if(!empty($_dados['latitude'])){
			?>
			<latitude>
            	<?php echo $_dados['latitude'];?>
            </latitude>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['longitude'])){
			?>
			<longitude>
            	<?php echo $_dados['longitude'];?>
            </longitude>
			<?php
				}
			?>
			<?php
				if(!empty($_dados['video'])){
			?>
            <video>
            	https://www.youtube.com/embed/<?php echo $_dados['video'];?>
            </video>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['tamanho_area_comum'])){
			?>
            <area_comum>
            	<item><?php echo $_dados['tamanho_area_comum'];?></item>
            </area_comum>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['tamanho_area_privativa'])){
			?>
            <area_privativa>
            	<item><?php echo $_dados['tamanho_area_privativa'];?></item>
            </area_privativa>
            <?php
				}
			?>
        </imovel>
        <?php
			}
		?>
    </imoveis>
</Document>