<?php
	include_once("../adm_gerencia/includes/Conexao.php");
	header("Content-Type: application/xml; charset=utf-8");
	echo '<?xml version="1.0" encoding="utf-8"?>';

	$hoje = date('Y-m-d H:i:s');
	
	// Função para Remover os Caracteres Especiais em Html
	$arrayCaracteresEspeciaisHtml1 = array
	(
		"&ordf", "&rdquo", "&ldquo", "&deg;", "&ordm;", "&acute;", "&sup2;", "&#13;", "&uacute;", "&ccedil;", "üã", "&Aacute;", "&aacute;", "&Acirc;", "&acirc;", "&Agrave;", "&agrave;", "&Aring;", "&aring;", "&Atilde;", "&atilde;", "&Auml;", "&auml;", "&AElig;", "&aelig;", 
		"&Eacute;", "&eacute;", "&Ecirc;", "&ecirc;", "&Egrave;", "&egrave;", "&Euml;", "&euml;", "&ETH;", "&eth;", "&Iacute;", "&iacute;", "&Icirc;", "&icirc;",  
		"&Igrave;", "&igrave;", "&Iuml;", "&iuml;", "&Oacute;", "&oacute;", "&Ocirc;", "&ocirc;", "&Ograve;", "&ograve;", "&Oslash;", "&oslash;", "&Otilde;", "&otilde;", 
		"&Uacute;", "&uacute;", "&Ucirc;", "&ucirc;", "&Ugrave;", "&ugrave;", "&Uuml;", "&uuml;", "&Ccedil;", "&ccedil;", "&Ntilde;", "&ntilde;", "&lt;", "&gt;", "&amp;",
		"&Ouml;", "&ouml;", "&quot;", "&reg;", "&copy;", "&Yacute;", "&yacute;", "&THORN;", "&thorn;", "&szlig;", "&nbsp;", "\n", "  ", "
		"
	);		 
	$arrayCaracteresEspeciaisHtml2 = array
	(
		"", "", "", "º", "º", "'", "²", "", "ú", "ç", "ç", "Á", "á", "Â", "â", "À", "à", "Å", "å", "Ã", "ã", "Ä", "ä", "Æ", "æ", 
		"É", "é", "Ê", "ê", "È", "è", "Ë", "ë", "Ð", "ð", "Í", "í", "Î", "î", 
		"Ì", "ì", "Ï", "ï", "Ó", "ó", "Ô", "ô", "Ò", "ò", "Ø", "ø", "Õ", "õ", "Ö;", "ö", 
		"Ú", "ú", "Û", "û", "Ù;", "ù", "Ü", "ü", "Ç", "ç", "Ñ", "ñ", "<", ">", "&",
		'"', "®", "©", "Ý", "ý", "Þ;", "þ", "ß", " ", "", " ", ""
	);
?>
<ListingDataFeed xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <imoveis>
        <email><?php echo EMAIL;?></email>
        <?php
			$_sql = mysqli_query($link, "SELECT * FROM tb_imoveis_anuncios WHERE status='S' AND integracao_mercado_livre='S'");
			while($_dados = mysqli_fetch_array($_sql)){
		?>
        <!-- IMÓVEL <?php echo $_dados['id'];?> -->
		<imovel>
            <?php
				if(!empty($_dados['referencia'])){
			?>
            <imovelId>
				<?php echo utf8_encode($_dados['referencia']);?>
            </imovelId>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['nome'])){
			?>
            <title>
				<?php echo utf8_encode($_dados['nome']);?>
            </title>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['id_tipo'])){
			?>
            <category>
            	<?php 				
					$sql_Tipos   = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE id='".$_dados['id_tipo']."'");
					$dados_Tipos = mysqli_fetch_array($sql_Tipos);
					$_tipo = str_replace(" / ","/",$dados_Tipos['nome']);
					
					switch ($_dados['id_tipo']) {
						case  1: echo "Apartamentos"; break;
						case  2: echo "Galpões"; break;
						case  3: echo "Casas"; break;
						case  4: echo "Chácaras"; break;
						case  5: echo "Apartamentos"; break;
						case  6: echo "Salas Comerciais"; break;
						case  7: echo "Apartamentos"; break;
						case  8: echo "Fazendas"; break;
						case  9: echo "Flat - Apart Hotel"; break;
						case 10: echo "Outros Imóveis"; break;
						case 12: echo "Outros Imóveis"; break;
						case 13: echo "Outros Imóveis"; break;
						case 14: echo "Lojas Comerciais"; break;
						case 15: echo "Casas"; break;
						case 16: echo "Terrenos"; break;
						case 17: echo "Terrenos"; break;
						case 18: echo "Terrenos"; break;
						case 19: echo "Terrenos"; break;
						case 20: echo "Casas"; break;
					}
					
					echo " > ";
					
					$sql_Transacao   = mysqli_query($link, "SELECT * FROM tb_imoveis_transacao WHERE id='".$_dados['id_transacao']."'");
					$dados_Transacao = mysqli_fetch_array($sql_Transacao);
					$_transacao = str_replace(" / ","/",$dados_Transacao['nome']);
					
					switch ($_dados['id_transacao']) {
						case  1: echo "Venda"; break;
						case  2: echo "Aluguel"; break;
						case  3: echo "Temporada"; break;
					}
					
				?>
            </category>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['preco'])){
			?>
            <price>
            	<?php echo $_dados['preco'];?>
            </price>
            <?php
				}
			?>
            <listingType><![CDATA[gold]]></listingType>
            <location>
                <country abbreviation="BR">
                	Brasil
                </country>
                <?php
					if(!empty($_dados['estado'])){
				?>
                <state abbreviation="<?php echo $_dados['estado'];?>">
                <?php 
						switch ($_dados['estado'])
						{
							case 'AC': echo "Acre"; break;
							case 'AL': echo "Alagoas"; break;
							case 'AP': echo "Amapá"; break;
							case 'AM': echo "Amazonas"; break;
							case 'BA': echo "Bahia"; break;
							case 'CE': echo "Ceará"; break;
							case 'DF': echo "Distrito Federal"; break;
							case 'ES': echo "Espírito Santo"; break;
							case 'GO': echo "Goiás"; break;
							case 'MA': echo "Maranhão"; break;
							case 'MT': echo "Mato Grosso"; break;
							case 'MS': echo "Mato Grosso do Sul"; break;
							case 'MG': echo "Minas Gerais"; break;
							case 'PA': echo "Pará"; break;
							case 'PB': echo "Paraíba"; break;
							case 'PR': echo "Paraná"; break;
							case 'PE': echo "Pernambuco"; break;
							case 'PI': echo "Piauí"; break;
							case 'RJ': echo "Rio de Janeiro"; break;
							case 'RN': echo "Rio Grande do Norte"; break;
							case 'RS': echo "Rio Grande do Sul"; break;
							case 'RO': echo "Rondônia"; break;
							case 'RR': echo "Roraima"; break;
							case 'SC': echo "Santa Catarina"; break;
							case 'SP': echo "São Paulo"; break;
							case 'SE': echo "Sergipe"; break;
							case 'TO': echo "Tocantins"; break;
						}
					?>
                </state>
                <?php
					}
				?>
                <?php
					if(!empty($_dados['id_cidade'])){
				?>
				<city>
					<?php 				
						$sql_Cidade   = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE id='".$_dados['id_cidade']."'");
						$dados_Cidade = mysqli_fetch_array($sql_Cidade);
						echo utf8_encode($dados_Cidade['nome']);
					?>
				</city>
				<?php
					}
				?>
                <?php
					if(!empty($_dados['id_bairro'])){
				?>
				<neighborhood>
					<?php 				
						$sql_Bairro   = mysqli_query($link, "SELECT * FROM tb_imoveis_bairros WHERE id='".$_dados['id_bairro']."'");
						$dados_Bairro = mysqli_fetch_array($sql_Bairro);
						echo utf8_encode($dados_Bairro['nome']);
					?>
				</neighborhood>
				<?php
					}
				?>
                <?php
					if(!empty($_dados['endereco'])){
				?>
				<addressLine>
					<?php echo utf8_encode($_dados['endereco']);?>
				</addressLine>
				<?php
					}
				?>
                <?php
					if(!empty($_dados['cep'])){
				?>
				<zipCode>
					<?php echo utf8_encode($_dados['cep']);?>
				</zipCode>
				<?php
					}
				?>
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
            </location>
            <sellerContact>
                <contact><?php echo utf8_encode(NOME);?></contact>
                <phone><?php echo TELEFONE;?></phone>
                <email><?php echo EMAIL;?></email>
                <webpage><?php echo $_linkCompleto;?></webpage>
            </sellerContact>
            <pictures>
                <imageURL><?php echo $_linkCompleto;?>/assets/uploads/tb_imoveis_anuncios/<?php echo $_dados['id']."/".$_dados['foto'];?></imageURL>
                <?php
					$_sql_Foto = mysqli_query($link, "SELECT * FROM tb_imoveis_fotos WHERE id_registro='".$_dados['id']."'");
					while($_dados_Foto = mysqli_fetch_array($_sql_Foto)){
				?>
                <imageURL><?php echo $_linkCompleto;?>/assets/uploads/tb_imoveis_anuncios/<?php echo $_dados['id']."/".$_dados_Foto['foto'];?></imageURL>
                <?php
					}
				?>
            </pictures>
            <attributes>
                <?php
					if(!empty($_dados['tamanho_area_total'])){
				?>
                <attribute>
                	<name>Área total (m²)</name>
                	<value><?php echo $_dados['tamanho_area_total'];?></value>
                </attribute>
                <?php
					}
				?>
                <?php
					if(!empty($_dados['tamanho_area_privativa'])){
				?>
				<attribute>
                	<name>Área útil (m²)</name>
                	<value><?php echo $_dados['tamanho_area_privativa'];?></value>
                </attribute>
				<?php
					}
				?>
                <?php
					if(!empty($_dados['dependencias_quartos'])){
				?>
                <attribute>
                	<name>Dormitórios</name>
                	<value><?php echo $_dados['dependencias_quartos'];?></value>
                </attribute>
				<?php
					}
				?>
                <?php
					if(!empty($_dados['dependencias_banheiro'])){
				?>
                <attribute>
                	<name>Banheiros</name>
                	<value><?php echo $_dados['dependencias_banheiro'];?></value>
                </attribute>
				<?php
					}
				?>
                <?php
					if(!empty($_dados['dependencias_garagem'])){
				?>
                <attribute>
                	<name>Qtd de vagas de garagem</name>
                	<value><?php echo $_dados['dependencias_garagem'];?></value>
                </attribute>
				<?php
					}
				?>
                <?php
					if(!empty($_dados['dependencias_suites'])){
				?>
                <attribute>
                	<name>Suítes</name>
                	<value><?php echo $_dados['dependencias_suites'];?></value>
                </attribute>
				<?php
					}
				?>
            </attributes>
            <?php
				if(!empty($_dados['descricao'])){
			?>
            <description>
            	<?php 
					$texto = utf8_encode($_dados['descricao']);
					$texto = str_replace($arrayCaracteresEspeciaisHtml1, $arrayCaracteresEspeciaisHtml2, ($texto));
					$texto = str_replace("</p>","<br><br>",$texto); 
					$texto = str_replace("&bull;","-",$texto);
					$texto = str_replace("<br>","\r\n",$texto);
					$texto = strip_tags($texto); 
					echo $texto;
                ?>
            </description>
            <?php
				}
			?>
        </imovel>
		<?php
			}
		?>
    </imoveis>
</ListingDataFeed>