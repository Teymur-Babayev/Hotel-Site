<?php
	include_once("../adm_gerencia/includes/Conexao.php");
	header("Content-Type: application/xml; charset=utf-8");
	echo '<?xml version="1.0" encoding="utf-8"?>';

	$hoje = date('Y-m-d H:i:s');
	
	// Função para Remover os Caracteres Especiais em Html
	$arrayCaracteresEspeciaisHtml1 = array
	(
		"&bull;", "&deg;", "&ordm;", "&acute;", "&sup2;", "&#13;", "&uacute;", "&ccedil;", "üã", "&Aacute;", "&aacute;", "&Acirc;", "&acirc;", "&Agrave;", "&agrave;", "&Aring;", "&aring;", "&Atilde;", "&atilde;", "&Auml;", "&auml;", "&AElig;", "&aelig;", 
		"&Eacute;", "&eacute;", "&Ecirc;", "&ecirc;", "&Egrave;", "&egrave;", "&Euml;", "&euml;", "&ETH;", "&eth;", "&Iacute;", "&iacute;", "&Icirc;", "&icirc;",  
		"&Igrave;", "&igrave;", "&Iuml;", "&iuml;", "&Oacute;", "&oacute;", "&Ocirc;", "&ocirc;", "&Ograve;", "&ograve;", "&Oslash;", "&oslash;", "&Otilde;", "&otilde;", 
		"&Uacute;", "&uacute;", "&Ucirc;", "&ucirc;", "&Ugrave;", "&ugrave;", "&Uuml;", "&uuml;", "&Ccedil;", "&ccedil;", "&Ntilde;", "&ntilde;", "&lt;", "&gt;", "&amp;",
		"&Ouml;", "&ouml;", "&quot;", "&reg;", "&copy;", "&Yacute;", "&yacute;", "&THORN;", "&thorn;", "&szlig;", "&nbsp;", "\n", "  ", "
		"
	);		 
	$arrayCaracteresEspeciaisHtml2 = array
	(
		"-", "º", "º", "'", "²", "", "ú", "ç", "ç", "Á", "á", "Â", "â", "À", "à", "Å", "å", "Ã", "ã", "Ä", "ä", "Æ", "æ", 
		"É", "é", "Ê", "ê", "È", "è", "Ë", "ë", "Ð", "ð", "Í", "í", "Î", "î", 
		"Ì", "ì", "Ï", "ï", "Ó", "ó", "Ô", "ô", "Ò", "ò", "Ø", "ø", "Õ", "õ", "Ö;", "ö", 
		"Ú", "ú", "Û", "û", "Ù;", "ù", "Ü", "ü", "Ç", "ç", "Ñ", "ñ", "<", ">", "&",
		'"', "®", "©", "Ý", "ý", "Þ;", "þ", "ß", " ", "", " ", ""
	);
?>
<Carga xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <Imoveis>
        <?php
			$_sql = mysqli_query($link, "SELECT * FROM tb_imoveis_anuncios WHERE status='S' AND integracao_imovelweb='S'");
			while($_dados = mysqli_fetch_array($_sql)){
		?>
        <!-- IMÓVEL <?php echo $_dados['id'];?> -->
        <Imovel>
            <?php 
				if($_dados['destaque'] == "S"){
			?>
            <publicacao>
            	<tipoPublicacao><![CDATA[DESTACADO]]></tipoPublicacao> 		
            </publicacao>
            <?php
                }
            ?>
			<?php
				if(!empty($_dados['referencia'])){
			?>
            <CodigoCentralVendas><?php echo utf8_encode($_dados['referencia']);?></CodigoCentralVendas>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['referencia'])){
			?>
            <CodigoImovel><?php echo utf8_encode($_dados['referencia']);?></CodigoImovel>
            <?php
				}
			?>
            <Modelo>Simples</Modelo>
            <?php
				if(!empty($_dados['nome'])){
			?>
            <TituloImovel><?php echo utf8_encode($_dados['nome']);?></TituloImovel>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['preco'])){
			?>
            <PrecoVenda><?php echo $_dados['preco'];?></PrecoVenda>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['preco_condominio'])){
			?>
            <PrecoCondominio><?php echo $_dados['preco_condominio'];?></PrecoCondominio>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['preco_iptu'])){
			?>
            <ValorIPTU><?php echo $_dados['preco_iptu'];?></ValorIPTU>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['id_tipo'])){
			?>
            <TipoImovel><?php 				
					$sql_Tipos   = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE id='".$_dados['id_tipo']."'");
					$dados_Tipos = mysqli_fetch_array($sql_Tipos);
					$_tipo = str_replace(" / ","/",$dados_Tipos['nome']);
					echo utf8_encode($_tipo);
				?></TipoImovel>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['estado'])){
			?>
            <UF><?php echo $_dados['estado'];?></UF>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['id_cidade'])){
			?>
            <Cidade><?php 				
					$sql_Cidade   = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE id='".$_dados['id_cidade']."'");
					$dados_Cidade = mysqli_fetch_array($sql_Cidade);
					echo utf8_encode($dados_Cidade['nome']);
				?></Cidade>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['id_bairro'])){
			?>
            <Bairro><?php 				
					$sql_Bairro   = mysqli_query($link, "SELECT * FROM tb_imoveis_bairros WHERE id='".$_dados['id_bairro']."'");
					$dados_Bairro = mysqli_fetch_array($sql_Bairro);
					echo utf8_encode($dados_Bairro['nome']);
				?></Bairro>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['cep'])){
			?>
            <CEP><?php echo utf8_encode($_dados['cep']);?></CEP>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_quartos'])){
			?>
            <QtdDormitorios><?php echo $_dados['dependencias_quartos'];?></QtdDormitorios>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_suites'])){
			?>
            <QtdSuites><?php echo $_dados['dependencias_suites'];?></QtdSuites>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_banheiro'])){
			?>
            <QtdBanheiros><?php echo $_dados['dependencias_banheiro'];?></QtdBanheiros>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_salas'])){
			?>
            <QtdSalas><?php echo $_dados['dependencias_salas'];?></QtdSalas>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['dependencias_garagem'])){
			?>
            <QtdVagas><?php echo $_dados['dependencias_garagem'];?></QtdVagas>
            <?php
				}
			?>
            <?php
				if(!empty($_dados['descricao'])){
			?>
            <Observacao><![CDATA[<?php 
					$texto = utf8_encode($_dados['descricao']);
					$texto = str_replace($arrayCaracteresEspeciaisHtml1, $arrayCaracteresEspeciaisHtml2, ($texto));
					$texto = str_replace("</p>","<br><br>",$texto); 
					$texto = str_replace("&bull;","-",$texto);
					$texto = str_replace("<br><br>","\n \n",$texto);
					$texto = strip_tags($texto); 
					echo $texto;
                ?>]]></Observacao>
            <?php
				}
			?>
            <UrlAtendimentoOnline>
            	<?php echo $_linkCompleto;?>/contato
            </UrlAtendimentoOnline>
            <Fotos>
                <Foto>
                    <NomeArquivo>Img_Principal</NomeArquivo>
					<URLArquivo><?php echo $_linkCompleto;?>/assets/uploads/tb_imoveis_anuncios/<?php echo $_dados['id']."/".$_dados['foto'];?></URLArquivo>
                    <?php
                        if(!empty($_dados['nome'])){
                    ?>
                    <Descricao><?php echo utf8_encode($_dados['nome']);?></Descricao>
                    <?php
                        }
                    ?>
                    <Principal>1</Principal>
                </Foto>
                <?php
                    $_sql_Foto = mysqli_query($link, "SELECT * FROM tb_imoveis_fotos WHERE id_registro='".$_dados['id']."'");
                    while($_dados_Foto = mysqli_fetch_array($_sql_Foto)){
                ?>
                <Foto>
                    <NomeArquivo>Img_<?php echo $_dados['id'];?></NomeArquivo>
                    <URLArquivo><?php echo $_linkCompleto;?>/assets/uploads/tb_imoveis_anuncios/<?php echo $_dados['id']."/".$_dados_Foto['foto'];?></URLArquivo>
                </Foto>
                <?php
                	}
                ?>
            </Fotos>
        </Imovel>
        <?php
        	}
        ?>
    </Imoveis>
</Carga>