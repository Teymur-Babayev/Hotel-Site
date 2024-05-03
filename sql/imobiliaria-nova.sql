-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16-Jul-2021 às 11:52
-- Versão do servidor: 8.0.25
-- versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `johndanilo_projetos_imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_banners`
--

CREATE TABLE `tb_banners` (
  `id` int NOT NULL,
  `id_ordem` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `link_banner` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_banners`
--

INSERT INTO `tb_banners` (`id`, `id_ordem`, `data_criacao`, `data_edicao`, `nome`, `link_banner`, `foto`, `status`, `login_usuario`) VALUES
(1, 1, '2021-03-16 10:55:02', '2021-03-16 10:55:02', 'Banner Teste', 'Contato', '6050b8b637493l1xotz.png', 'S', 'administrador'),
(2, 3, '2021-03-16 15:30:23', '2021-03-17 11:13:18', 'Teste', '#', '60520e7e439cbnr2di1.png', 'S', 'administrador'),
(3, 2, '2021-03-17 11:14:25', '2021-03-17 11:14:25', 'Banner 02', '', '60520ec16449bv1thaq.png', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_configuracao`
--

CREATE TABLE `tb_configuracao` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(300) NOT NULL,
  `creci` varchar(10) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_recebe_contato` varchar(50) NOT NULL,
  `cor_primaria` varchar(10) NOT NULL,
  `cor_secundaria` varchar(10) NOT NULL,
  `logo_topo` varchar(100) NOT NULL,
  `logo_rodape` varchar(100) NOT NULL,
  `logo_fotos` varchar(100) NOT NULL,
  `favicon_site` varchar(100) NOT NULL,
  `qtd_destaques` varchar(2) NOT NULL,
  `qtd_recentes` varchar(2) NOT NULL,
  `img_compartilhamento` varchar(100) NOT NULL,
  `link_facebook` varchar(200) NOT NULL,
  `link_linkedin` varchar(200) NOT NULL,
  `link_instagram` varchar(200) NOT NULL,
  `link_twitter` varchar(200) NOT NULL,
  `server_email_porta` int NOT NULL,
  `server_email_host` varchar(100) NOT NULL,
  `server_email_usuario` varchar(100) NOT NULL,
  `server_email_senha` varchar(30) NOT NULL,
  `key_google_analytics` text NOT NULL,
  `key_google_maps` varchar(100) NOT NULL,
  `meta_keywords` text NOT NULL,
  `login_usuario` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_configuracao`
--

INSERT INTO `tb_configuracao` (`id`, `data_criacao`, `data_edicao`, `nome`, `creci`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `celular`, `email`, `email_recebe_contato`, `cor_primaria`, `cor_secundaria`, `logo_topo`, `logo_rodape`, `logo_fotos`, `favicon_site`, `qtd_destaques`, `qtd_recentes`, `img_compartilhamento`, `link_facebook`, `link_linkedin`, `link_instagram`, `link_twitter`, `server_email_porta`, `server_email_host`, `server_email_usuario`, `server_email_senha`, `key_google_analytics`, `key_google_maps`, `meta_keywords`, `login_usuario`) VALUES
(1, '2021-03-13 10:27:28', '2021-07-15 09:32:24', 'Imobiliária Meu Site Rápido', '913551', 'Rua Nossa Senhora da Aparecida', '100', 'Casa 2', 'Vila Santa Terezinha', 'Campo Largo', 'PR', '83602-140', '(41) 9996-67897', '(41) 99966-7897', 'contato@johndanilo.com.br', 'contato@johndanilo.com.br', '#231f20', '#ec2b22', '5fbeaee0a100anbgk1x.png', '5fbeaee0a12a1nmskxo.png', '5e8e34aa5ca3bf0sgy.png', '5fbeaee0a3d95kaiwvi.png', '15', '21', '6051248a29d2aeammus.png', '#', '#', '#', '#', 587, 'mail.johndanilo.com.br', 'site@johndanilo.com.br', 'j0hnd4n1l0t0z4t0', '', '', 'Site de imóveis, site para corretores, site para imobiliárias, compra imóvel, casa para alugar barata, imóvel no centro', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estatisticas`
--

CREATE TABLE `tb_estatisticas` (
  `id` int NOT NULL,
  `ip` varchar(256) NOT NULL,
  `navegador` varchar(255) DEFAULT NULL,
  `idioma` varchar(2) DEFAULT NULL,
  `fuso_horario` varchar(100) DEFAULT NULL,
  `OS` varchar(64) DEFAULT NULL,
  `dia_semana` int NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latitude` decimal(9,4) DEFAULT NULL,
  `longitude` decimal(9,4) DEFAULT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `precisao` int DEFAULT NULL,
  `referencia` varchar(256) DEFAULT NULL,
  `dominio` varchar(100) DEFAULT NULL,
  `pagina` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_estatisticas`
--

INSERT INTO `tb_estatisticas` (`id`, `ip`, `navegador`, `idioma`, `fuso_horario`, `OS`, `dia_semana`, `data`, `latitude`, `longitude`, `cidade`, `estado`, `pais`, `precisao`, `referencia`, `dominio`, `pagina`) VALUES
(1, '143.137.84.183', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Windows 7', 4, '2021-07-15 12:44:54', -25.4382, -50.0803, 'Palmeira', 'Parana', 'Brazil', 80467, 'https://projetos.johndanilo.com.br/imobiliaria/', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(2, '143.137.84.183', 'Unknown', 'pt', 'America/Sao_Paulo', 'Unknown OS Platform', 4, '2021-07-15 12:58:53', -25.4382, -50.0803, 'Palmeira', 'Parana', 'Brazil', 80467, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(3, '143.137.84.183', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Windows 7', 4, '2021-07-15 13:21:58', -25.4382, -50.0803, 'Palmeira', 'Parana', 'Brazil', 80467, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(4, 'bb6b8257.virtua.com.br', 'Mozilla Firefox', 'pt', 'America/Sao_Paulo', 'Unknown OS Platform', 4, '2021-07-15 13:27:48', -22.6113, -47.3802, 'Limeira', 'Sao Paulo', 'Brazil', 8047, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(5, 'ip201.159.31.100.qlink.net.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Unknown OS Platform', 4, '2021-07-15 13:27:57', -23.2972, -46.2442, 'Santa Isabel', 'Sao Paulo', 'Brazil', 16093, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(6, '170-79-32-11.wantel.net.br', 'Google Chrome', 'pt', 'America/Recife', 'Unknown OS Platform', 4, '2021-07-15 13:28:57', -9.3904, -40.5048, 'Petrolina', 'Pernambuco', 'Brazil', 1609, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(7, 'b3da0e7b.virtua.com.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Android', 4, '2021-07-15 13:29:28', -22.9201, -43.3307, 'Rio de Janeiro', 'Rio de Janeiro', 'Brazil', 1609, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(8, 'bfb1b797.virtua.com.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Unknown OS Platform', 4, '2021-07-15 13:32:11', -25.5039, -49.2908, 'Curitiba', 'Parana', 'Brazil', 16093, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(9, 'ip-177-25-160-146.user.vivozap.com.br', 'Google Chrome', 'pt', 'America/Bahia', 'Android', 4, '2021-07-15 13:33:47', -12.8665, -38.4858, 'Salvador', 'Bahia', 'Brazil', 321868, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(10, '29.71.40.189.isp.timbrasil.com.br', 'Apple Safari', 'pt', 'America/Sao_Paulo', 'iPhone', 4, '2021-07-15 13:40:44', -25.5039, -49.2908, 'Curitiba', 'Parana', 'Brazil', 160934, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(11, '177.8.86.74', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Linux', 4, '2021-07-15 13:41:58', -30.1146, -51.1639, 'Porto Alegre', 'Rio Grande do Sul', 'Brazil', 321868, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(12, '191.219.85.248', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Android', 4, '2021-07-15 13:47:31', -25.5039, -49.2908, 'Curitiba', 'Parana', 'Brazil', 321868, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(13, '191.219.85.248', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Android', 4, '2021-07-15 13:47:32', -25.5039, -49.2908, 'Curitiba', 'Parana', 'Brazil', 321868, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(14, 'b18e4271.virtua.com.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Android', 4, '2021-07-15 13:57:35', -22.9201, -43.3307, 'Rio de Janeiro', 'Rio de Janeiro', 'Brazil', 32187, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(15, 'crawl-66-249-75-88.googlebot.com', 'Unknown', 'en', 'America/Chicago', 'Unknown OS Platform', 4, '2021-07-15 14:18:55', 37.7510, -97.8220, '', '', 'United States', 1609340, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(16, '143.137.84.183', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Windows 7', 4, '2021-07-15 14:25:07', -25.4382, -50.0803, 'Palmeira', 'Parana', 'Brazil', 80467, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(17, '179-225-157-23.user.vivozap.com.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Unknown OS Platform', 4, '2021-07-15 14:26:01', -22.9775, -46.9749, 'Valinhos', 'Sao Paulo', 'Brazil', 16093, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(18, '177.8.86.74', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Linux', 4, '2021-07-15 15:03:34', -30.1146, -51.1639, 'Porto Alegre', 'Rio Grande do Sul', 'Brazil', 321868, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(19, '213.186.1.203', 'Unknown', '', 'Europe/Zagreb', 'Unknown OS Platform', 4, '2021-07-15 15:34:00', 45.8293, 15.9793, 'Zagreb', 'City of Zagreb', 'Croatia', 80467, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(20, '143.137.84.183', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Windows 7', 4, '2021-07-15 15:40:32', -25.4382, -50.0803, 'Palmeira', 'Parana', 'Brazil', 80467, 'https://projetos.johndanilo.com.br/imobiliaria/imovel/2/detalhes/apartamento-no-centro/referencia/L2027', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(21, '179-110-79-254.dsl.telesp.net.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Android', 4, '2021-07-15 15:54:15', -22.7141, -47.2901, 'Americana', 'Sao Paulo', 'Brazil', 1609, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(22, 'rate-limited-proxy-66-249-91-184.google.com', 'Google Chrome', '', 'America/Los_Angeles', 'Unknown OS Platform', 4, '2021-07-15 16:01:15', 37.4043, -122.0748, 'Mountain View', 'California', 'United States', 1609340, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(23, 'rate-limited-proxy-66-249-91-182.google.com', 'Google Chrome', '', 'America/Los_Angeles', 'Android', 4, '2021-07-15 16:01:52', 37.4043, -122.0748, 'Mountain View', 'California', 'United States', 1609340, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(24, '177.8.86.74', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Linux', 4, '2021-07-15 16:12:17', -30.1146, -51.1639, 'Porto Alegre', 'Rio Grande do Sul', 'Brazil', 321868, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(25, 'ip-177-25-184-36.user.vivozap.com.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Android', 4, '2021-07-15 21:17:13', -22.9201, -43.3307, 'Rio de Janeiro', 'Rio de Janeiro', 'Brazil', 160934, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(26, 'ip-177-25-172-223.user.vivozap.com.br', 'Google Chrome', 'pt', 'America/Bahia', 'Android', 4, '2021-07-15 21:19:14', -12.8665, -38.4858, 'Salvador', 'Bahia', 'Brazil', 321868, 'https://projetos.johndanilo.com.br/imobiliaria/', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(27, '179.124.56.60', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Android', 5, '2021-07-16 04:14:54', -15.5694, -49.9348, 'Itapuranga', 'Goias', 'Brazil', 32187, 'https://m.youtube.com/', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(28, 'clientes-63.188.dbug.com.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Windows 7', 5, '2021-07-16 11:02:24', -25.2841, -49.5961, 'Campo Largo', 'Parana', 'Brazil', 80467, 'https://projetos.johndanilo.com.br/imobiliaria/', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(29, 'clientes-63.188.dbug.com.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Windows 7', 5, '2021-07-16 11:38:01', -25.2841, -49.5961, 'Campo Largo', 'Parana', 'Brazil', 80467, '', 'projetos.johndanilo.com.br', '/imobiliaria/'),
(30, 'clientes-63.188.dbug.com.br', 'Google Chrome', 'pt', 'America/Sao_Paulo', 'Windows 7', 5, '2021-07-16 13:10:23', -25.2841, -49.5961, 'Campo Largo', 'Parana', 'Brazil', 80467, '', 'projetos.johndanilo.com.br', '/imobiliaria/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_financiadores`
--

CREATE TABLE `tb_financiadores` (
  `id` int NOT NULL,
  `id_ordem` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `link_financiamento` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_financiadores`
--

INSERT INTO `tb_financiadores` (`id`, `id_ordem`, `data_criacao`, `data_edicao`, `nome`, `link_financiamento`, `foto`, `status`, `login_usuario`) VALUES
(1, 0, '2021-03-16 10:43:03', '2021-03-16 10:43:03', 'Minha Casa Minha Vida', '#', '6050b5e76660aet8d5h.png', 'S', 'administrador'),
(2, 0, '2021-03-16 10:44:11', '2021-03-16 10:44:11', 'Banco do Brasil', 'https://www42.bb.com.br/portalbb/imobiliario/creditoimobiliario/simular,802,2250,2250.bbx', '6050b62b081b5n8ijye.png', 'S', 'administrador'),
(3, 0, '2021-03-16 10:45:23', '2021-03-16 10:45:23', 'Caixa Econômica Federal', 'http://www8.caixa.gov.br/siopiinternet-web/simulaOperacaoInternet.do?method=inicializarCasoUso', '6050b673a32c77muqsi.png', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_adicionais`
--

CREATE TABLE `tb_imoveis_adicionais` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(30) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_adicionais`
--

INSERT INTO `tb_imoveis_adicionais` (`id`, `data_criacao`, `data_edicao`, `nome`, `status`, `login_usuario`) VALUES
(1, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Piscina', 'S', 'administrador'),
(2, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Ar Condicionado', 'S', 'administrador'),
(3, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Lareira', 'S', 'administrador'),
(4, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Playground', 'S', 'administrador'),
(5, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Churrasqueira', 'S', 'administrador'),
(6, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Academia', 'S', 'administrador'),
(7, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Quadra Esportiva', 'S', 'administrador'),
(8, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Salão de Eventos', 'S', 'administrador'),
(9, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Portaria 24h', 'S', 'administrador'),
(10, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Laje', 'S', 'administrador'),
(11, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Documentos ok', 'S', 'administrador'),
(12, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Financiamento caixa', 'S', 'administrador'),
(13, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Cancha de Areia', 'S', 'administrador'),
(14, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Administração de Condomínio', 'S', 'administrador'),
(15, '2021-03-13 09:49:31', '2021-03-13 09:49:31', 'Interfone individual', 'S', 'administrador'),
(16, '2021-07-14 07:45:54', '2021-07-14 07:45:54', 'Câmeras de Segurança', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_anuncios`
--

CREATE TABLE `tb_imoveis_anuncios` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_ordem` int NOT NULL DEFAULT '1',
  `url_amigavel` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `destaque` enum('S','N') NOT NULL DEFAULT 'N',
  `lancamento` enum('S','N') NOT NULL DEFAULT 'N',
  `integracao_chaves_na_mao` enum('S','N') NOT NULL DEFAULT 'N',
  `integracao_imovelweb` enum('S','N') NOT NULL DEFAULT 'N',
  `integracao_mercado_livre` enum('S','N') NOT NULL DEFAULT 'N',
  `integracao_olx_imoveis` enum('S','N') NOT NULL DEFAULT 'N',
  `integracao_vivareal` enum('S','N') NOT NULL DEFAULT 'N',
  `integracao_zap_imoveis` enum('S','N') NOT NULL DEFAULT 'N',
  `id_transacao` int NOT NULL,
  `id_finalidade` int NOT NULL,
  `id_tipo` int NOT NULL,
  `id_corretor` int NOT NULL,
  `referencia` varchar(10) NOT NULL,
  `nome` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descricao` text NOT NULL,
  `observacoes` text NOT NULL,
  `adicionais` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `video` varchar(20) NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `preco_iptu` decimal(10,0) NOT NULL,
  `preco_condominio` decimal(10,0) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `ponto_referencia` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_bairro` int NOT NULL,
  `id_cidade` int NOT NULL,
  `estado` varchar(2) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `google_maps` text NOT NULL,
  `dependencias_quartos` int NOT NULL,
  `dependencias_suites` int NOT NULL,
  `dependencias_garagem` int NOT NULL,
  `dependencias_banheiro` int NOT NULL,
  `dependencias_closet` int NOT NULL,
  `dependencias_salas` int NOT NULL,
  `dependencias_despensa` int NOT NULL,
  `dependencias_bar` int NOT NULL,
  `dependencias_cozinha` int NOT NULL,
  `dependencias_quarto_empregada` int NOT NULL,
  `dependencias_escritorio` int NOT NULL,
  `dependencias_area_servico` int NOT NULL,
  `dependencias_lareira` int NOT NULL,
  `dependencias_varanda` int NOT NULL,
  `dependencias_lavanderia` int NOT NULL,
  `tamanho_area_privativa` varchar(10) NOT NULL,
  `tamanho_area_total` varchar(10) NOT NULL,
  `tamanho_area_terreno` varchar(10) NOT NULL,
  `tamanho_area_construida` varchar(10) NOT NULL,
  `tamanho_area_comum` varchar(10) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_anuncios`
--

INSERT INTO `tb_imoveis_anuncios` (`id`, `data_criacao`, `data_edicao`, `id_ordem`, `url_amigavel`, `destaque`, `lancamento`, `integracao_chaves_na_mao`, `integracao_imovelweb`, `integracao_mercado_livre`, `integracao_olx_imoveis`, `integracao_vivareal`, `integracao_zap_imoveis`, `id_transacao`, `id_finalidade`, `id_tipo`, `id_corretor`, `referencia`, `nome`, `descricao`, `observacoes`, `adicionais`, `foto`, `video`, `preco`, `preco_iptu`, `preco_condominio`, `cep`, `endereco`, `numero`, `complemento`, `ponto_referencia`, `id_bairro`, `id_cidade`, `estado`, `latitude`, `longitude`, `google_maps`, `dependencias_quartos`, `dependencias_suites`, `dependencias_garagem`, `dependencias_banheiro`, `dependencias_closet`, `dependencias_salas`, `dependencias_despensa`, `dependencias_bar`, `dependencias_cozinha`, `dependencias_quarto_empregada`, `dependencias_escritorio`, `dependencias_area_servico`, `dependencias_lareira`, `dependencias_varanda`, `dependencias_lavanderia`, `tamanho_area_privativa`, `tamanho_area_total`, `tamanho_area_terreno`, `tamanho_area_construida`, `tamanho_area_comum`, `status`, `login_usuario`) VALUES
(1, '2021-03-16 15:09:14', '2021-03-16 15:09:14', 0, 'lindo-sobrado-para-venda-em-otima-localizacao', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 1, 1, 15, 1, '7897', 'Lindo Sobrado para venda em ótima Localização', '<p>Descri&ccedil;&atilde;o</p>\r\n', '<p>Observa&ccedil;&atilde;o</p>\r\n', '', '6050f44a2454bblzyyd.png', 'oqzOcZ3DqZM', 380000, 420, 0, '83602-140', 'Rua Nossa Senhora da Aparecida', '131', 'Quadra B', 'Tijolão Materiais para Construção', 3, 1, 'PR', '-25.4632839', '-49.5414253', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3602.2512703043535!2d-49.54142528498512!3d-25.463283883773105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dd17779db2eb45%3A0xfff8c2a37c215c!2sR.%20Nossa%20Sra.%20da%20Aparecida%2C%20131%20-%20Vila%20Santa%20Terezinha%2C%20Campo%20Largo%20-%20PR%2C%2083602-140!5e0!3m2!1spt-BR!2sbr!4v1615918141247!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 4, 3, 2, 5, 0, 2, 2, 0, 2, 0, 1, 2, 0, 2, 2, '420', '230', '600', '190', '100', 'S', 'administrador'),
(2, '2021-03-17 07:04:20', '2021-03-29 10:24:13', 0, 'apartamento-no-centro', 'S', 'N', 'N', 'S', 'N', 'S', 'S', 'N', 2, 1, 1, 1, 'L2027', 'Apartamento no Centro', '<p>Bel&iacute;ssimo apartamento, com vista para a Pra&ccedil;a Get&uacute;lio Vargas.&nbsp; Parcialmente reformado, teto rebaixado em gesso com ilumina&ccedil;&atilde;o direta e indireta, arm&aacute;rios embutidos nos quartos, composto por:<br />\r\n<br />\r\n- Sala<br />\r\n- 03 quartos (01 su&iacute;te)<br />\r\n- Banheiro social<br />\r\n- Cozinha<br />\r\n- &Aacute;rea de servi&ccedil;o<br />\r\n- Dend&ecirc;ncia de empregada completa<br />\r\n- 01 vaga de garagem&nbsp;<br />\r\n- Pr&eacute;dio com elevador&nbsp;</p>\r\n', '<p>Contrato direto com o propriet&aacute;rio, entre em contato com o seu corretor e saiba mais...</p>\r\n', '#6#13#5#1#4#9#7#', '6051d424d2580eii5kg.png', 'oqzOcZ3DqZM', 1800, 145, 682, '83602-450', 'Rua Otávio Fabris', '125', '', 'Tijolão Materiais para Construção', 12, 2, 'PR', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3602.2512703043535!2d-49.54142528498512!3d-25.463283883773105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dd17779db2eb45%3A0xfff8c2a37c215c!2sR.%20Nossa%20Sra.%20da%20Aparecida%2C%20131%20-%20Vila%20Santa%20Terezinha%2C%20Campo%20Largo%20-%20PR%2C%2083602-140!5e0!3m2!1spt-BR!2sbr!4v1615918141247!5m2!1spt-BR!2sbr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 3, 1, 1, 3, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, '311', '352', '150', '652', '290', 'S', 'administrador'),
(3, '2021-03-17 07:07:13', '2021-03-17 07:07:13', 0, 'apartamento-no-sitio-sao-luis', 'S', 'N', 'N', 'N', 'S', 'N', 'N', 'N', 2, 1, 1, 1, 'L2026', 'Apartamento no Sítio São Luis', '<p>Apartamento padr&atilde;o, com &oacute;tima localiza&ccedil;&atilde;o e vista exuberante, composto por:</p>\r\n\r\n<p>- Sala (com sacada)</p>\r\n\r\n<p>- 02 Quartos</p>\r\n\r\n<p>- Cozinha</p>\r\n\r\n<p>- Banheiro</p>\r\n\r\n<p>- &Aacute;rea de servi&ccedil;o</p>\r\n\r\n<p>Condom&iacute;nio: R$100,00</p>\r\n', '', '', '6051d4d1627echtp8ty.png', '', 700, 0, 0, '83605-120', 'Rua João Bertoja Filho', '27', '', '', 14, 1, 'PR', '', '', '', 2, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '70', '', '', '', 'S', 'administrador'),
(4, '2021-03-17 07:10:48', '2021-03-17 07:10:48', 0, 'terreno-em-varginha', 'S', 'N', 'S', 'N', 'N', 'N', 'N', 'N', 1, 3, 16, 1, 'T5006', 'Terreno em Varginha', '<p>Terreno com 970&sup2;, com &oacute;tima topografia, totalmente plano.</p>\r\n\r\n<p>O terreno j&aacute; possui 03 im&oacute;veis constru&iacute;dos, sendo eles:</p>\r\n\r\n<p>- 01 loja (j&aacute; alugada).</p>\r\n\r\n<p>- 01 casa com 01 quarto, sala, cozinha, banheiro e &aacute;rea de servi&ccedil;o.</p>\r\n\r\n<p>- 01 casa com 02 quartos, sala, cozinha, banheiro e &aacute;rea de&nbsp;servi&ccedil;o.</p>\r\n\r\n<p>Excelente oportunidade para moradia ou investimento!</p>\r\n', '', '', '6051d5a8acca763zh5x.png', '', 360000, 0, 0, '83609-290', 'Rua Paraná', '25', '', '', 13, 2, 'PR', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '970', '', '', '', 'S', 'administrador'),
(5, '2021-03-17 07:13:30', '2021-03-17 07:13:30', 0, 'casa-na-granja-mimosa', 'S', 'N', 'N', 'N', 'N', 'S', 'N', 'N', 1, 1, 3, 1, 'C3019', 'Casa na Granja Mimosa', '<p>Excelente im&oacute;vel a venda, com vista exuberante!</p>\r\n\r\n<p>Im&oacute;vel com terreno&nbsp; de 595m&sup2;, com dois pavimentos, sendo o primeiro com 180m&sup2;, composto por:</p>\r\n\r\n<p>- 2 quartos (1 su&iacute;te)</p>\r\n\r\n<p>- Sala</p>\r\n\r\n<p>- Cozinha</p>\r\n\r\n<p>- Banheiro social</p>\r\n\r\n<p>- Copa</p>\r\n\r\n<p>- Cozinha</p>\r\n\r\n<p>- &Aacute;rea de servi&ccedil;o</p>\r\n\r\n<p>- Garagem para 05 carros</p>\r\n\r\n<p>2&ordm; Pavimento, com 60&sup2;,&nbsp;composto por:</p>\r\n\r\n<p>- 01 quarto</p>\r\n\r\n<p>- Sala</p>\r\n\r\n<p>- Cozinha</p>\r\n\r\n<p>- Banheiro</p>\r\n\r\n<p>- &Aacute;rea de servi&ccedil;o</p>\r\n\r\n<p>- Varanda (que possibilita a amplia&ccedil;&atilde;o do im&oacute;vel)</p>\r\n\r\n<p>S&atilde;o duas casas, podendo ter acesso independente. O im&oacute;vel possui funda&ccedil;&atilde;o que possibilita&nbsp;a constru&ccedil;&atilde;o de mais 03 casas.&nbsp;</p>\r\n\r\n<p>- Terreno com parte frontal possuindo obra iniciada com planta aprovada para constru&ccedil;&atilde;o de pr&eacute;dio com 03 apartamentos de 02 quartos.&nbsp;</p>\r\n\r\n<p>Excelente oportunidade para moradia ou investimento!</p>\r\n', '', '', '6051d64a8ba691odqyj.png', '', 850000, 0, 0, '83602-290', 'Rua Albino Grande', '14', '', '', 12, 2, 'PR', '', '', '', 3, 1, 5, 3, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '456', '', '', '', 'S', 'administrador'),
(6, '2021-03-17 07:15:30', '2021-03-17 07:15:30', 0, 'apartamento-no-centro', 'S', 'N', 'N', 'N', 'N', 'N', 'S', 'N', 1, 1, 1, 1, 'L1022', 'Apartamento no Centro', '<p>Amplo apartamento, no centro da cidade, composto por:</p>\r\n\r\n<p>- Sala</p>\r\n\r\n<p>- 02 quartos</p>\r\n\r\n<p>- Cozinha</p>\r\n\r\n<p>- Banheiro</p>\r\n\r\n<p>- &Aacute;rea de servi&ccedil;o</p>\r\n\r\n<p>N&atilde;o possui condom&iacute;nio, <strong>&eacute; pago</strong> apenas o consumo da &aacute;gua.</p>\r\n', '', '', '6051d6c2ee418f7r0hs.png', '', 1400, 0, 0, '83602-560', 'Rua Antônio Vidal', '27', '', '', 3, 1, 'PR', '', '', '', 2, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '90', '', '', '', 'S', 'administrador'),
(7, '2021-03-17 07:18:23', '2021-03-17 07:18:23', 0, 'apartamento-no-centro', 'S', 'N', 'N', 'N', 'N', 'N', 'N', 'S', 2, 1, 1, 1, 'L2021', 'Apartamento no Centro', '<p>Excelente apartamento, localizado no centro da cidade, pr&oacute;ximo aos principais com&eacute;rcios e pontos tur&iacute;sticos, composto por:</p>\r\n\r\n<p>- Sala ampla em 02 ambientes&nbsp;</p>\r\n\r\n<p>- 03 quartos (01 su&iacute;te)</p>\r\n\r\n<p>- Banheiro social</p>\r\n\r\n<p>- Cozinha</p>\r\n\r\n<p>- &Aacute;rea de servi&ccedil;o</p>\r\n\r\n<p>- Depenc&ecirc;ncia de empregada completa</p>\r\n\r\n<p>- Elevador e vaga de garagem</p>\r\n', '', '', '6051d76f8d4d0ujh5i5.png', '', 1300, 0, 0, '83601-050', 'Rua Generoso Marques', '27', '', '', 10, 2, 'PR', '', '', '', 3, 1, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '140', '', '', '', 'S', 'administrador'),
(8, '2021-03-17 07:21:44', '2021-03-17 07:21:44', 0, 'apartamento-braunes', 'S', 'N', 'N', 'N', 'S', 'S', 'N', 'N', 2, 1, 1, 1, 'L1020', 'Apartamento Braunes', '<p>Excelente apartamento localizado a 1km do centro da cidade, com c&ocirc;modos amplos, composto por:</p>\r\n\r\n<p>- Sala</p>\r\n\r\n<p>- 03 quartos</p>\r\n\r\n<p>- Banheiro social</p>\r\n\r\n<p>- Cozinha&nbsp;</p>\r\n\r\n<p>- &Aacute;rea de servi&ccedil;o</p>\r\n\r\n<p>- Banheiro de empregada</p>\r\n\r\n<p>- Vaga de garagem</p>\r\n', '', '', '6051d83955c4dq65qe7.png', '', 0, 0, 320, '82520-130', 'Rua Joaquim Américo Guimarães', '78', '', '', 5, 4, 'PR', '', '', '', 3, 0, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '100', '', '', '', 'S', 'administrador'),
(9, '2021-03-17 07:23:50', '2021-03-17 07:23:50', 0, 'galpao-na-chacara-do-paraiso', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 2, 2, 2, 1, 'L1019', 'Galpão na Chácara do Paraíso', '', '', '', '6051d8b687db6oppzod.png', '', 20000, 0, 0, '83602-520', 'Rua Alceu Fabris', '55', '', '', 6, 3, 'PR', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '288', '', '', '', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_bairros`
--

CREATE TABLE `tb_imoveis_bairros` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_cidade` char(5) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_bairros`
--

INSERT INTO `tb_imoveis_bairros` (`id`, `data_criacao`, `data_edicao`, `id_cidade`, `nome`, `status`, `login_usuario`) VALUES
(1, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '1', 'São Vicente', 'S', 'administrador'),
(2, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '1', 'Bom Jesus', 'S', 'administrador'),
(3, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '1', 'Centro', 'S', 'administrador'),
(5, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '4', 'Matinhos', 'S', 'administrador'),
(6, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '3', 'Juvevê', 'S', 'administrador'),
(7, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '1', 'Jardim Cristo Rei', 'S', 'administrador'),
(8, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '1', 'Francisco Gorski', 'S', 'administrador'),
(9, '2021-03-13 09:47:35', '2021-03-16 12:00:09', '1', 'Águas Claras', 'S', 'administrador'),
(10, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '2', 'Aparecida', 'S', 'administrador'),
(11, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '1', 'Vila Bancária', 'S', 'administrador'),
(12, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '2', 'Centro', 'S', 'administrador'),
(13, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '2', 'Bugre', 'S', 'administrador'),
(14, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '1', 'Santa Terezinha', 'S', 'administrador'),
(15, '2021-03-13 09:47:35', '2021-03-13 09:47:35', '4', 'Balneário Shangri-lá', 'S', 'administrador'),
(16, '2021-03-17 14:41:00', '2021-03-17 14:41:00', '6', 'Capela Velha', 'S', 'administrador'),
(17, '2021-03-17 14:41:15', '2021-03-17 14:41:15', '6', 'São Sebastião', 'S', 'administrador'),
(18, '2021-07-14 07:45:07', '2021-07-14 07:45:07', '7', 'Lapa', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_cidades`
--

CREATE TABLE `tb_imoveis_cidades` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(30) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_cidades`
--

INSERT INTO `tb_imoveis_cidades` (`id`, `data_criacao`, `data_edicao`, `nome`, `status`, `login_usuario`) VALUES
(1, '2021-03-13 09:50:49', '2021-03-13 09:50:49', 'Campo Largo', 'S', 'administrador'),
(2, '2021-03-13 09:50:49', '2021-03-13 09:50:49', 'Balsa Nova', 'S', 'administrador'),
(3, '2021-03-13 09:50:49', '2021-03-13 09:50:49', 'Curitiba', 'S', 'administrador'),
(4, '2021-03-13 09:50:49', '2021-03-13 09:50:49', 'Pontal do Paraná', 'S', 'administrador'),
(6, '2021-03-16 11:43:13', '2021-03-16 11:59:52', 'Araucária', 'S', 'administrador'),
(7, '2021-07-14 07:44:54', '2021-07-14 07:44:54', 'Contenda', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_corretores`
--

CREATE TABLE `tb_imoveis_corretores` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(30) NOT NULL,
  `creci` varchar(10) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_corretores`
--

INSERT INTO `tb_imoveis_corretores` (`id`, `data_criacao`, `data_edicao`, `nome`, `creci`, `telefone`, `celular`, `email`, `foto`, `status`, `login_usuario`) VALUES
(1, '2021-03-13 09:51:19', '2021-03-16 12:13:56', 'John Danilo Tozato', '667897', '(41) 3392-6101', '(41) 99966-7897', 'contato@johndanilo.com.br', '6050cb3469c506sjaij.png', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_estatisticas`
--

CREATE TABLE `tb_imoveis_estatisticas` (
  `id` int NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_imovel` int NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_finalidade`
--

CREATE TABLE `tb_imoveis_finalidade` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(30) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_finalidade`
--

INSERT INTO `tb_imoveis_finalidade` (`id`, `data_criacao`, `data_edicao`, `nome`, `status`, `login_usuario`) VALUES
(1, '2021-03-13 09:52:03', '2021-03-13 09:52:03', 'Residencial', 'S', 'administrador'),
(2, '2021-03-13 09:52:03', '2021-03-13 09:52:03', 'Comercial', 'S', 'administrador'),
(3, '2021-03-13 09:52:03', '2021-03-13 09:52:03', 'Rural', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_fotos`
--

CREATE TABLE `tb_imoveis_fotos` (
  `id` int NOT NULL,
  `id_registro` int NOT NULL,
  `id_ordem` int NOT NULL DEFAULT '1',
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(255) NOT NULL,
  `login_usuario` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_fotos`
--

INSERT INTO `tb_imoveis_fotos` (`id`, `id_registro`, `id_ordem`, `data_criacao`, `foto`, `login_usuario`) VALUES
(21, 1, 0, '2021-03-16 15:15:42', '6050f5cee2d18c1kmho.jpg', 'administrador'),
(22, 1, 0, '2021-03-16 15:15:42', '6050f5cee38d01er5x6.jpg', 'administrador'),
(23, 1, 0, '2021-03-16 15:15:42', '6050f5cee3cb8ww8c5a.jpg', 'administrador'),
(24, 1, 0, '2021-03-16 15:15:42', '6050f5cee448819nd1y.jpg', 'administrador'),
(25, 1, 0, '2021-03-16 15:15:42', '6050f5cee48701nf55c.jpg', 'administrador'),
(26, 2, 0, '2021-03-17 07:07:36', '6051d4e809b33ceawuo.jpg', 'administrador'),
(27, 2, 0, '2021-03-17 07:07:36', '6051d4e809f1b7lud3j.jpg', 'administrador'),
(28, 2, 0, '2021-03-17 07:07:36', '6051d4e80aebb47iexf.jpg', 'administrador'),
(29, 2, 0, '2021-03-17 07:07:36', '6051d4e80be5czf0ziv.jpg', 'administrador'),
(30, 2, 0, '2021-03-17 07:07:36', '6051d4e80cdfc5lbryc.jpg', 'administrador'),
(31, 2, 0, '2021-03-17 07:07:36', '6051d4e80d1e46z6tv.jpg', 'administrador'),
(32, 2, 0, '2021-03-17 07:07:36', '6051d4e80d5cc4ge7dx.jpg', 'administrador'),
(33, 2, 0, '2021-03-17 07:07:36', '6051d4e80d9b45jgoc0.jpg', 'administrador'),
(34, 2, 0, '2021-03-17 07:07:36', '6051d4e80dd9ciboc54.jpg', 'administrador'),
(35, 2, 0, '2021-03-17 07:07:36', '6051d4e80e184sj6nxs.jpg', 'administrador'),
(36, 2, 0, '2021-03-17 07:07:36', '6051d4e80e1847byrol.jpg', 'administrador'),
(37, 2, 0, '2021-03-17 07:07:36', '6051d4e80e56cyg2wxe.jpg', 'administrador'),
(38, 2, 0, '2021-03-17 07:07:36', '6051d4e80e954hnuzj4.jpg', 'administrador'),
(39, 3, 0, '2021-03-17 07:08:02', '6051d502e6c768uttih.jpg', 'administrador'),
(40, 3, 0, '2021-03-17 07:08:02', '6051d502e705eklgrnq.jpg', 'administrador'),
(41, 3, 0, '2021-03-17 07:08:02', '6051d502e7446rlw3c6.jpg', 'administrador'),
(42, 3, 0, '2021-03-17 07:08:02', '6051d502e782eu3oups.jpg', 'administrador'),
(43, 3, 0, '2021-03-17 07:08:02', '6051d502e782es6i2t2.jpg', 'administrador'),
(44, 3, 0, '2021-03-17 07:08:02', '6051d502e7ffee25xe6.jpg', 'administrador'),
(45, 3, 0, '2021-03-17 07:08:02', '6051d502e83e6y2byk2.jpg', 'administrador'),
(46, 3, 0, '2021-03-17 07:08:02', '6051d502e87cexj0zny.jpg', 'administrador'),
(47, 3, 0, '2021-03-17 07:08:02', '6051d502e8bb69m9c51.jpg', 'administrador'),
(48, 4, 0, '2021-03-17 07:11:06', '6051d5ba82cdb5n90wy.jpg', 'administrador'),
(49, 4, 0, '2021-03-17 07:11:06', '6051d5ba830c3vdc00e.jpg', 'administrador'),
(50, 4, 0, '2021-03-17 07:11:06', '6051d5ba84c1b6hitm9.jpg', 'administrador'),
(51, 4, 0, '2021-03-17 07:11:06', '6051d5ba85003ukc989.jpg', 'administrador'),
(52, 4, 0, '2021-03-17 07:11:06', '6051d5ba853ebu56n95.jpg', 'administrador'),
(53, 4, 0, '2021-03-17 07:11:06', '6051d5ba853eb29rxq7.jpg', 'administrador'),
(54, 4, 0, '2021-03-17 07:11:06', '6051d5ba857d3sz58hm.jpg', 'administrador'),
(55, 4, 0, '2021-03-17 07:11:06', '6051d5ba85bbbygoeq6.jpg', 'administrador'),
(56, 4, 0, '2021-03-17 07:11:06', '6051d5ba86b5cu0wigm.jpg', 'administrador'),
(57, 4, 0, '2021-03-17 07:11:06', '6051d5ba86f44fiv5gk.jpg', 'administrador'),
(58, 4, 0, '2021-03-17 07:11:06', '6051d5ba8732ctnrqu9.jpg', 'administrador'),
(59, 5, 0, '2021-03-17 07:13:45', '6051d659d98053su7e1.jpg', 'administrador'),
(60, 5, 0, '2021-03-17 07:13:45', '6051d659d9bedhsgcg1.jpg', 'administrador'),
(61, 5, 0, '2021-03-17 07:13:45', '6051d659d9fd5kd68rv.jpg', 'administrador'),
(62, 5, 0, '2021-03-17 07:13:45', '6051d659da3beckcif3.jpg', 'administrador'),
(63, 5, 0, '2021-03-17 07:13:45', '6051d659da7a6rr1xv8.jpg', 'administrador'),
(64, 5, 0, '2021-03-17 07:13:45', '6051d659daf762olavr.jpg', 'administrador'),
(65, 5, 0, '2021-03-17 07:13:45', '6051d659db35etvfxsj.jpg', 'administrador'),
(66, 5, 0, '2021-03-17 07:13:45', '6051d659db746vf8tat.jpg', 'administrador'),
(67, 5, 0, '2021-03-17 07:13:45', '6051d659dbb2eqtspjv.jpg', 'administrador'),
(68, 5, 0, '2021-03-17 07:13:45', '6051d659dbb2ehb3j7u.jpg', 'administrador'),
(69, 5, 0, '2021-03-17 07:13:45', '6051d659dbf16cdkarn.jpg', 'administrador'),
(70, 5, 0, '2021-03-17 07:13:45', '6051d659dc2ferdzhs9.jpg', 'administrador'),
(71, 6, 0, '2021-03-17 07:15:46', '6051d6d2c0170d6jlal.jpg', 'administrador'),
(72, 6, 0, '2021-03-17 07:15:46', '6051d6d2c0558dk0u92.jpg', 'administrador'),
(73, 6, 0, '2021-03-17 07:15:46', '6051d6d2c0d28ajzmz.jpg', 'administrador'),
(74, 6, 0, '2021-03-17 07:15:46', '6051d6d2c1110zajdo6.jpg', 'administrador'),
(75, 6, 0, '2021-03-17 07:15:46', '6051d6d2c1110symjbb.jpg', 'administrador'),
(76, 6, 0, '2021-03-17 07:15:46', '6051d6d2c14f84i8nly.jpg', 'administrador'),
(77, 6, 0, '2021-03-17 07:15:46', '6051d6d2c18e1yfw5w4.jpg', 'administrador'),
(78, 6, 0, '2021-03-17 07:15:46', '6051d6d2c1cc9e4xfg8.jpg', 'administrador'),
(79, 6, 0, '2021-03-17 07:15:46', '6051d6d2c2499dowqzu.jpg', 'administrador'),
(80, 6, 0, '2021-03-17 07:15:46', '6051d6d2c2c69qvoj07.jpg', 'administrador'),
(81, 7, 0, '2021-03-17 07:18:47', '6051d7873c16a4aqplb.jpg', 'administrador'),
(82, 7, 0, '2021-03-17 07:18:47', '6051d7873c5527rt8du.jpg', 'administrador'),
(83, 7, 0, '2021-03-17 07:18:47', '6051d7873c93amd0ue1.jpg', 'administrador'),
(84, 7, 0, '2021-03-17 07:18:47', '6051d7873cd22opar6w.jpg', 'administrador'),
(85, 7, 0, '2021-03-17 07:18:47', '6051d7873d10ansilz2.jpg', 'administrador'),
(86, 7, 0, '2021-03-17 07:18:47', '6051d7873d4f2tuvd2j.jpg', 'administrador'),
(87, 7, 0, '2021-03-17 07:18:47', '6051d7873d4f2cyzim5.jpg', 'administrador'),
(88, 7, 0, '2021-03-17 07:18:47', '6051d7873d8dawzolyh.jpg', 'administrador'),
(89, 7, 0, '2021-03-17 07:18:47', '6051d7873dcc23asfdj.jpg', 'administrador'),
(90, 7, 0, '2021-03-17 07:18:47', '6051d7873dcc28ki741.jpg', 'administrador'),
(91, 7, 0, '2021-03-17 07:18:47', '6051d7873e492gaho68.jpg', 'administrador'),
(92, 7, 0, '2021-03-17 07:18:47', '6051d7873e87avwn729.jpg', 'administrador'),
(93, 7, 0, '2021-03-17 07:18:47', '6051d7873ec63fqs00n.jpg', 'administrador'),
(94, 7, 0, '2021-03-17 07:18:47', '6051d7873f04bjd5a9c.jpg', 'administrador'),
(95, 7, 0, '2021-03-17 07:18:47', '6051d787407bb8t192a.jpg', 'administrador'),
(96, 7, 0, '2021-03-17 07:18:47', '6051d78740ba3evft55.jpg', 'administrador'),
(97, 8, 0, '2021-03-17 07:22:01', '6051d8492567d4jdee4.jpg', 'administrador'),
(98, 8, 0, '2021-03-17 07:22:01', '6051d84925a653dgz2o.jpg', 'administrador'),
(99, 8, 0, '2021-03-17 07:22:01', '6051d849289451s4dd8.jpg', 'administrador'),
(100, 8, 0, '2021-03-17 07:22:01', '6051d849294femix4x9.jpg', 'administrador'),
(101, 8, 0, '2021-03-17 07:22:01', '6051d849298e6dbml61.jpg', 'administrador'),
(102, 8, 0, '2021-03-17 07:22:01', '6051d84929ccep88q0d.jpg', 'administrador'),
(103, 8, 0, '2021-03-17 07:22:01', '6051d8492a49esblavb.jpg', 'administrador'),
(104, 8, 0, '2021-03-17 07:22:01', '6051d8492ac6ehtxoy.jpg', 'administrador'),
(105, 8, 0, '2021-03-17 07:22:01', '6051d8492b056ee6wnx.jpg', 'administrador'),
(106, 8, 0, '2021-03-17 07:22:01', '6051d8492b43e4gxywu.jpg', 'administrador'),
(107, 9, 0, '2021-03-17 07:24:05', '6051d8c5e68de1pdx1z.jpg', 'administrador'),
(108, 9, 0, '2021-03-17 07:24:05', '6051d8c5e6cc63be18m.jpg', 'administrador'),
(109, 9, 0, '2021-03-17 07:24:05', '6051d8c5e7497hnvinj.jpg', 'administrador'),
(110, 9, 0, '2021-03-17 07:24:05', '6051d8c5e787fc8mm0r.jpg', 'administrador'),
(111, 9, 0, '2021-03-17 07:24:05', '6051d8c5e7c67k8rp3q.jpg', 'administrador'),
(112, 9, 0, '2021-03-17 07:24:05', '6051d8c5e804fvwv5f3.jpg', 'administrador'),
(113, 9, 0, '2021-03-17 07:24:05', '6051d8c5e84378pjszm.jpg', 'administrador'),
(114, 9, 0, '2021-03-17 07:24:05', '6051d8c5e8437syi0cu.jpg', 'administrador'),
(115, 9, 0, '2021-03-17 07:24:05', '6051d8c5e881fpmo11e.jpg', 'administrador'),
(116, 9, 0, '2021-03-17 07:24:05', '6051d8c5e8fefk3ojd7.jpg', 'administrador'),
(117, 9, 0, '2021-03-17 07:24:05', '6051d8c5e97bfauo362.jpg', 'administrador'),
(118, 9, 0, '2021-03-17 07:24:05', '6051d8c5e9ba7z41yub.jpg', 'administrador'),
(119, 9, 0, '2021-03-17 07:24:05', '6051d8c5e9f8fmd23ex.jpg', 'administrador'),
(120, 9, 0, '2021-03-17 07:24:05', '6051d8c5e9f8f6z2s57.jpg', 'administrador'),
(121, 9, 0, '2021-03-17 07:24:05', '6051d8c5ea377bh2jpe.jpg', 'administrador'),
(122, 9, 0, '2021-03-17 07:24:05', '6051d8c5ea75fp35yy0.jpg', 'administrador'),
(123, 9, 0, '2021-03-17 07:24:05', '6051d8c5eab474mxzr5.jpg', 'administrador'),
(124, 9, 0, '2021-03-17 07:24:05', '6051d8c5eaf2fb46kyx.jpg', 'administrador'),
(125, 9, 0, '2021-03-17 07:24:05', '6051d8c5eb317wec61l.jpg', 'administrador'),
(126, 9, 0, '2021-03-17 07:24:05', '6051d8c5eb700k3b2lj.jpg', 'administrador'),
(127, 9, 0, '2021-03-17 07:24:05', '6051d8c5eb700woeoys.jpg', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_tipos`
--

CREATE TABLE `tb_imoveis_tipos` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(30) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_tipos`
--

INSERT INTO `tb_imoveis_tipos` (`id`, `data_criacao`, `data_edicao`, `nome`, `status`, `login_usuario`) VALUES
(1, '2021-03-13 09:53:19', '2021-07-14 07:44:07', 'Apartamento', 'S', 'administrador'),
(2, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Barracão / Galpão', 'S', 'administrador'),
(3, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Casa', 'S', 'administrador'),
(4, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Chácara', 'S', 'administrador'),
(5, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Cobertura', 'S', 'administrador'),
(6, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Conjunto Comercial', 'S', 'administrador'),
(7, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Edifício', 'S', 'administrador'),
(8, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Fazenda', 'S', 'administrador'),
(9, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Flat', 'S', 'administrador'),
(10, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Garagem', 'S', 'administrador'),
(11, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Flat', 'S', 'administrador'),
(12, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Kitnet / Stúdio', 'S', 'administrador'),
(13, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Loft', 'S', 'administrador'),
(14, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Loja / Comércio', 'S', 'administrador'),
(15, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Sobrados', 'S', 'administrador'),
(16, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Terreno', 'S', 'administrador'),
(17, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Terreno Comercial', 'S', 'administrador'),
(18, '2021-03-13 09:53:19', '2021-03-13 09:53:19', 'Terreno em Condomínio', 'S', 'administrador'),
(19, '2021-07-14 07:44:25', '2021-07-14 07:44:25', 'Terreno Rural', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_transacao`
--

CREATE TABLE `tb_imoveis_transacao` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(30) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_transacao`
--

INSERT INTO `tb_imoveis_transacao` (`id`, `data_criacao`, `data_edicao`, `nome`, `status`, `login_usuario`) VALUES
(1, '2021-03-13 09:54:08', '2021-03-13 09:54:08', 'Venda', 'S', 'administrador'),
(2, '2021-03-13 09:54:08', '2021-03-13 09:54:08', 'Locação', 'S', 'administrador'),
(3, '2021-03-16 11:24:47', '2021-03-16 11:24:47', 'Temporada', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imoveis_visitas`
--

CREATE TABLE `tb_imoveis_visitas` (
  `ip` varchar(15) NOT NULL DEFAULT '',
  `id_registro` varchar(15) NOT NULL DEFAULT '',
  `data` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imoveis_visitas`
--

INSERT INTO `tb_imoveis_visitas` (`ip`, `id_registro`, `data`) VALUES
('143.137.84.183', '9', '2021-07-15 08:59:38'),
('143.137.84.183', '8', '2021-07-15 09:01:15'),
('143.137.84.183', '6', '2021-07-15 09:01:51'),
('143.137.84.183', '2', '2021-07-15 10:02:04'),
('187.107.130.87', '2', '2021-07-15 10:28:19'),
('201.159.31.100', '8', '2021-07-15 10:30:29'),
('191.177.183.151', '9', '2021-07-15 10:42:52'),
('191.219.85.248', '5', '2021-07-15 10:49:56'),
('143.137.84.183', '1', '2021-07-15 10:57:36'),
('179.225.157.23', '6', '2021-07-15 11:28:48'),
('179.225.157.23', '2', '2021-07-15 11:29:28'),
('177.8.86.74', '8', '2021-07-15 12:17:58'),
('177.8.86.74', '9', '2021-07-15 12:18:38'),
('177.8.86.74', '5', '2021-07-15 12:18:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_institucional`
--

CREATE TABLE `tb_institucional` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `missao` text NOT NULL,
  `visao` text NOT NULL,
  `valores` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `login_usuario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_institucional`
--

INSERT INTO `tb_institucional` (`id`, `data_criacao`, `data_edicao`, `nome`, `descricao`, `missao`, `visao`, `valores`, `foto`, `login_usuario`) VALUES
(1, '2021-03-13 10:41:24', '2021-07-14 07:40:15', 'Institucional', '<p>Precisando de uma solu&ccedil;&atilde;o ou querendo investir no mercado imobili&aacute;rio? Conte com a m&aacute;xima transpar&ecirc;ncia e aten&ccedil;&atilde;o de um corretor especializado.<br />\r\n<br />\r\nSomos profissionais na venda de im&oacute;veis novos e usados, comerciais, residenciais e rurais, prestamos toda assessoria necess&aacute;ria &agrave; realiza&ccedil;&atilde;o de uma transa&ccedil;&atilde;o segura e tranquila, com acompanhamento jur&iacute;dico e operacional de qualidade.<br />\r\n<br />\r\n<strong>Reconhecidos pela &eacute;tica profissional e transpar&ecirc;ncia no mercado imobili&aacute;rio, oferecemos a nossos clientes um atendimento personalizado, resultando em seguran&ccedil;a e satisfa&ccedil;&atilde;o a todos os neg&oacute;cios realizados</strong>.<br />\r\n<br />\r\nPossu&iacute;mos profissionais capacitados e diferenciados para uma total efici&ecirc;ncia e garantia nas intermedia&ccedil;&otilde;es imobili&aacute;rias.<br />\r\nEntre em contato, teremos o prazer em ajud&aacute;-lo a realizar o sonho de adquirir a casa pr&oacute;pria.<br />\r\n<br />\r\n<strong>Venha tomar um caf&eacute; conosco e deixe que cuidamos do seu novo im&oacute;vel, da capta&ccedil;&atilde;o at&eacute; a entrega das suas chaves.</strong></p>\r\n', 'Atuar no mercado imobiliário, com foco na locação e venda de imóveis, garantindo a satisfação dos clientes na prestação de serviços, através do comprometimento e qualificação contínua dos nossos colaboradores, da confiança e da credibilidade mantida ao longo dos anos de experiência profissional.', 'Ser líder no mercado imobiliário e manter o reconhecimento adquirido, estando entre as melhores administradoras de imóveis. Expandir nosso volume de locações e venda de imóveis por meio da qualidade dos nossos serviços e da profissionalização da nossa estrutura organizacional.', 'Nossos valores são fundamentais para a gestão e administração dos negócios imobiliários, de modo a garantir o melhor relacionamento interno e externo para nossos clientes e colaboradoes, são eles: Ética, Justiça, Respeito, Eficiência, Solidariedade, Comprometimento, Bom relacionamento interpessoal.', '6050b26cb7722um2b39.png', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_institucional_fotos`
--

CREATE TABLE `tb_institucional_fotos` (
  `id` int NOT NULL,
  `id_registro` int NOT NULL,
  `id_ordem` int NOT NULL DEFAULT '1',
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(255) NOT NULL,
  `login_usuario` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_institucional_fotos`
--

INSERT INTO `tb_institucional_fotos` (`id`, `id_registro`, `id_ordem`, `data_criacao`, `foto`, `login_usuario`) VALUES
(27, 1, 0, '2021-03-17 10:49:26', '605208e654f854wrci1.jpg', 'administrador'),
(28, 1, 0, '2021-03-17 10:49:26', '605208e655755dvr9d9.jpg', 'administrador'),
(29, 1, 0, '2021-03-17 10:49:26', '605208e655b3dxwc2ok.jpg', 'administrador'),
(30, 1, 0, '2021-03-17 10:49:26', '605208e6566f6r7aq20.jpg', 'administrador'),
(31, 1, 0, '2021-03-17 10:50:12', '60520914457f9vduw8t.jpg', 'administrador'),
(32, 1, 0, '2021-03-17 10:51:03', '605209477fd4bsec7db.jpg', 'administrador'),
(33, 1, 0, '2021-03-17 10:51:03', '605209478013366zib1.jpg', 'administrador'),
(34, 1, 0, '2021-03-17 10:51:34', '605209665ed093xpojl.jpg', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_newsletter`
--

CREATE TABLE `tb_newsletter` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_newsletter`
--

INSERT INTO `tb_newsletter` (`id`, `data_criacao`, `nome`, `telefone`, `email`) VALUES
(7, '2021-07-14 08:22:21', 'John Danilo', '', 'contato@johndanilo.com.br'),
(8, '2021-07-14 08:29:40', 'John Danilo', '(41) 99966-7897', 'johndanilosd@gmail.com'),
(9, '2021-07-14 08:30:15', 'John Danilo', '(41) 33926-101', 'johndanilosd@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_noticias`
--

CREATE TABLE `tb_noticias` (
  `id` int NOT NULL,
  `id_ordem` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url_amigavel` varchar(300) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` text NOT NULL,
  `texto` text NOT NULL,
  `creditos` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S',
  `login_usuario` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_noticias`
--

INSERT INTO `tb_noticias` (`id`, `id_ordem`, `data_criacao`, `data_edicao`, `url_amigavel`, `titulo`, `subtitulo`, `texto`, `creditos`, `foto`, `status`, `login_usuario`) VALUES
(1, 0, '2021-03-16 08:54:15', '2021-03-16 08:54:15', 'vendas-de-imoveis-avancam-20-e-lancamentos-voltam-a-crescer', 'Vendas de imóveis avançam 20% e lançamentos voltam a crescer', 'De acordo com dados da Abrainc, outubro foi o melhor mês de vendas desde 2014 e os lançamentos voltaram ao nível pré-pandemia. Recuperação é puxada pela baixa renda', '<p>A pandemia do coronav&iacute;rus afetou a economia brasileira como um todo, mas o setor de&nbsp;<strong>constru&ccedil;&atilde;o civil</strong>&nbsp;parece ter resistido melhor aos efeitos da crise. Dados divulgados pela&nbsp;<strong>Associa&ccedil;&atilde;o Brasileira de Incorporadoras Imobili&aacute;rias (Abrainc)</strong>&nbsp;mostram que as&nbsp;<strong>vendas de im&oacute;veis</strong>&nbsp;avan&ccedil;aram 20,5% nos 12 meses encerrados em outubro. Os&nbsp;<strong>lan&ccedil;amentos</strong>, antes paralisados, tamb&eacute;m voltaram a crescer e j&aacute; est&atilde;o no n&iacute;vel pr&eacute;-crise.</p>\r\n\r\n<p>&quot;Temos visto um consumidor resiliente na hora buscar oportunidades para adquirir a casa pr&oacute;pria, principalmente a popula&ccedil;&atilde;o de baixa renda em busca do primeiro im&oacute;vel. Isso tem puxado o desempenho do setor de incorpora&ccedil;&atilde;o, que tem investido em lan&ccedil;amentos de novos empreendimentos&quot;, afirma o presidente da Abrainc, Luiz Antonio Fran&ccedil;a.</p>\r\n\r\n<p>Em outubro, houve um salto de 67,9% nas vendas de unidades, na compara&ccedil;&atilde;o com o mesmo m&ecirc;s de 2019. Foi a maior varia&ccedil;&atilde;o percentual desde 2014. Os lan&ccedil;amentos de novos empreendimentos tiveram um salto de 85,5% no mesmo per&iacute;odo.</p>\r\n\r\n<p><strong>&Eacute; hora de mudar de casa? Alugar ou comprar? A EXAME Academy ajuda voc&ecirc;</strong></p>\r\n\r\n<p>Casa Verde e Amarela e Minha Casa Minha Vida</p>\r\n\r\n<p>O desempenho positivo tem sido puxado pelo segmento de baixa renda. De cada 10 im&oacute;veis lan&ccedil;ados nos &uacute;ltimos 12 meses, 8 eram pertencentes ao&nbsp;<strong>Programa Minha Casa Minha Vida (MCMV)</strong>, rebatizado de&nbsp;<strong>Programa Casa Verde e Amarela</strong>&nbsp;pelo governo de Jair Bolsonaro. O segmento de habita&ccedil;&atilde;o popular teve crescimento de 86,5% nas vendas em outubro de 2020. O n&uacute;mero de lan&ccedil;amentos mais do que dobrou no mesmo m&ecirc;s, tamb&eacute;m em rela&ccedil;&atilde;o a outubro de 2019.</p>\r\n\r\n<p>J&aacute; os im&oacute;veis de m&eacute;dio e alto padr&atilde;o acumulam queda nas vendas desde o in&iacute;cio da pandemia. As vendas de unidades de m&eacute;dio padr&atilde;o cresceram 3,1% e as de alto padr&atilde;o avan&ccedil;aram 10% no per&iacute;odo de agosto a outubro de 2020. Isso, no entanto, n&atilde;o foi suficiente para reverter a queda de 5,6% nas vendas registrada nos 12 meses encerrados em outubro.</p>\r\n\r\n<p>Com as vendas paradas, as construtoras e incorporadoras colocaram o p&eacute; no freio e adiaram os lan&ccedil;amentos de novos empreendimentos. A queda nos lan&ccedil;amentos chegou a 31,4% nos 12 meses encerrados em outubro, de acordo com a Abrainc.</p>\r\n', 'Revista Exame', '60509c67e8e84bddrp5.png', 'S', 'administrador'),
(2, 0, '2021-03-16 08:57:51', '2021-03-16 08:57:51', 'entenda-a-alta-na-procura-por-emprestimos-que-tem-imovel-como-garantia', 'Entenda a alta na procura por empréstimos que têm imóvel como garantia', 'Com taxas bem menores do que outras modalidades de empréstimo, home equity começa a ganhar espaço no Brasil. Número de contratos cresceu 25% em dois anos', '<p>O home equity &ndash; modalidade que permite a utiliza&ccedil;&atilde;o do im&oacute;vel pr&oacute;prio como garantia do empr&eacute;stimo &ndash;, vem chamando cada vez mais a aten&ccedil;&atilde;o dos brasileiros. Segundo dados da Associa&ccedil;&atilde;o Brasileira das Entidades de Cr&eacute;dito Imobili&aacute;rio e Poupan&ccedil;a (Abecip), o n&uacute;mero de contratos passou de 5.368, entre janeiro e agosto de 2018, para 6.721 no mesmo per&iacute;odo deste ano &ndash; um salto de 25%. O valor emprestado tamb&eacute;m apresentou alta de 50% nos &uacute;ltimos dois anos.</p>\r\n\r\n<p>Entre as explica&ccedil;&otilde;es para o bom desempenho dessa modalidade de empr&eacute;stimo est&atilde;o as baixas taxas de juros oferecidas pelo home equity: em torno de 1% ao m&ecirc;s &ndash; bem menos do que a cobrada em empr&eacute;stimos pessoais (cerca de 6,8% ao m&ecirc;s), e em empr&eacute;stimos consignados (2,8% ao m&ecirc;s em m&eacute;dia). &ldquo;Pegar uma taxa de juros menor d&aacute; um f&ocirc;lego fant&aacute;stico para que as pessoas consigam organizar as finan&ccedil;as, empreender ou mesmo reformar o im&oacute;vel&rdquo;, destaca Marcos Eduardo Carvalho, diretor comercial na&nbsp;<strong>Too Seguros</strong>.</p>\r\n\r\n<p>&ldquo;Estamos diante de uma solu&ccedil;&atilde;o muito mais competitiva do que linhas tradicionais, com taxas mais baratas ainda&rdquo;. Incentivos para que as pessoas recorram a esse tipo de solu&ccedil;&atilde;o n&atilde;o faltam. Al&eacute;m dos juros baixos, o Banco Central (BC) anunciou, no ano passado, ajustes na metodologia de c&aacute;lculo do capital exigido dos bancos para esse tipo de opera&ccedil;&atilde;o. Se antes era necess&aacute;rio manter um capital equivalente a 50% do valor emprestado, agora a porcentagem &eacute; de 35% caso o saldo devedor do empr&eacute;stimo seja de at&eacute; metade do valor de avalia&ccedil;&atilde;o do im&oacute;vel. Em uma coletiva, em janeiro deste ano, o presidente do BC, Roberto Campos Neto, afirmou que o home equity &eacute; &ldquo;uma modalidade segura e barata&rdquo;, e que tem o potencial de &ldquo;desmobilizar cerca de 500 bilh&otilde;es nos pr&oacute;ximos anos&rdquo;. Diante das perspectivas positivas, grandes institui&ccedil;&otilde;es financeiras passaram a reduzir suas taxas, refor&ccedil;ando a oferta do produto.</p>\r\n\r\n<p>Uma boa op&ccedil;&atilde;o para empreendedores</p>\r\n\r\n<p>O mercado tamb&eacute;m come&ccedil;ou a chamar a aten&ccedil;&atilde;o de startups como a&nbsp;Wimo, linha de home equity criada no ano passado pela corretora Wiz e a gestora Galapagos Capital. &ldquo;Hoje, 80% da nossa carteira &eacute; formada por empreendedores que pegam um empr&eacute;stimo para ampliar seu neg&oacute;cio&rdquo;, diz Luis Henrique Moraes, diretor de produtos da Wiz Solu&ccedil;&otilde;es. Entre as vantagens, diz ele, est&atilde;o o prazo de pagamento estendido (de at&eacute; 180 meses) a possibilidade de fazer um seguro que dilui o risco e protege o im&oacute;vel, o fato de o cliente ter a comprova&ccedil;&atilde;o de renda facilitada, e a preserva&ccedil;&atilde;o do fluxo de caixa. &ldquo;Como um novo neg&oacute;cio leva em torno de seis meses a um ano para decolar, o empreendedor consegue honrar com seus compromissos com mais tranquilidade, sem se descapitalizar.&rdquo;</p>\r\n\r\n<p>Seguro e garantias do im&oacute;vel</p>\r\n\r\n<p>Entusiasta do home equity, Carvalho, da Too Seguros &ndash; parceira de startups como a Wimo &ndash;, explica que o seguro &eacute; fundamental na medida em que garante a cobertura tanto em casos de danos f&iacute;sicos, como inc&ecirc;ndio, queda de raio, explos&atilde;o, inunda&ccedil;&atilde;o, alagamento, destelhamento e desmoronamento, como em casos de morte do segurado ou aposentadoria por invalidez. &ldquo;As coberturas podem ser personalizadas de acordo com as necessidades de bancos, financeiras e dos pr&oacute;prios segurados e garante mais tranquilidade tanto ao tomador do cr&eacute;dito como para a institui&ccedil;&atilde;o financeira.&rdquo;, destaca Carvalho.</p>\r\n', 'Revista Exame', '60509d3f49ce1ccy0hb.png', 'S', 'administrador'),
(3, 0, '2021-03-16 08:59:37', '2021-03-16 08:59:37', 'dois-pedidos-do-presidente-da-abyara-brokers-para-o-novo-prefeito-de-sp', 'Dois pedidos do presidente da Abyara Brokers para o novo prefeito de SP', 'Em entrevista à EXAME, Bruno Vivanco falou sobre a necessidade de revisão do Plano Diretor e dos efeitos da pandemia no mercado imobiliário', '<p>Os juros baixos, a abund&acirc;ncia de cr&eacute;dito e a retomada das atividades econ&ocirc;micas fizeram com que o mercado imobili&aacute;rio fosse um dos primeiros a dar sinais de recupera&ccedil;&atilde;o durante a pandemia. O &Iacute;ndice de Confian&ccedil;a da Constru&ccedil;&atilde;o, que mede a confian&ccedil;a do empresariado, fechou em 87,7 pontos no terceiro trimestre, acima dos 70 pontos do segundo trimestre. Os consumidores tamb&eacute;m est&atilde;o mais animados. Segundo a pesquisa Raio-X FipeZap, a propor&ccedil;&atilde;o de respondentes que declararam ter inten&ccedil;&atilde;o de adquirir im&oacute;veis nos pr&oacute;ximos tr&ecirc;s meses passou de 43%, no segundo trimestre, para 48%, no terceiro &ndash; um recorde na s&eacute;rie hist&oacute;rica da pesquisa iniciada em 2014.</p>\r\n\r\n<p>Os n&uacute;meros positivos se refletiram nos resultados da Holding Brasil Brokers, da qual a Abyara &eacute; a principal empresa no mercado prim&aacute;rio. Considerada um dos maiores grupos de intermedia&ccedil;&atilde;o e consultoria imobili&aacute;ria do pa&iacute;s, a empresa registrou uma receita bruta de 33,7 milh&otilde;es de reais entre julho e setembro, uma alta de 45% em rela&ccedil;&atilde;o ao trimestre anterior. No mesmo per&iacute;odo, o n&uacute;mero de unidades lan&ccedil;adas foi 79% superior, assim com o Valor Geral de Vendas, que cresceu 142% em rela&ccedil;&atilde;o ao per&iacute;odo de abril a junho, ficando em linha com o mesmo per&iacute;odo de 2019. &ldquo;A pandemia foi um choque. O Brasil ficou 40, 50, 60 dias sem saber muito bem o que iria acontecer, os estandes fecharam e n&oacute;s tivemos de intensificar o uso das ferramentas digitais que j&aacute; faziam parte do nosso dia a dia&rdquo;, lembra Bruno Vivanco, presidente da Abyara Brokers.</p>\r\n\r\n<p>Um novo olhar para a moradia</p>\r\n\r\n<p>O executivo, que est&aacute; na Abyara desde sua funda&ccedil;&atilde;o em 1995, passou por diversos cargos at&eacute; chegar ao de vice-presidente, onde permaneceu nos &uacute;ltimos oito anos at&eacute; assumir, em setembro deste ano, o posto de presidente da empresa. Ele conta que, ao longo de sua trajet&oacute;ria, acompanhou de perto o processo de digitaliza&ccedil;&atilde;o da empresa, acelerado com a chegada da pandemia. &ldquo;A assinatura digital j&aacute; era uma realidade para quem comprava im&oacute;veis para investimento. Por isso, j&aacute; t&iacute;nhamos uma estrutura preparada&rdquo;, afirma Vivanco. &ldquo;Hoje, mais de 80% dos contratos j&aacute; s&atilde;o assinados digitalmente.&rdquo;</p>\r\n\r\n<p>Segundo ele, a pandemia tamb&eacute;m mudou a forma de enxergar a moradia &ndash; e abriu portas para a busca de im&oacute;veis em cidades pr&oacute;ximas &agrave; capital. &ldquo;As pessoas come&ccedil;aram a procurar plantas mais inteligentes e com um espa&ccedil;o para home office&rdquo;, diz o executivo. &ldquo;Muitos tamb&eacute;m perceberam que podem ter um apartamento pequeno em S&atilde;o Paulo e uma casa nos arredores, o que fez explodir a procura por casas em condom&iacute;nio nos munic&iacute;pios pr&oacute;ximos &agrave; regi&atilde;o metropolitana de S&atilde;o Paulo, e na capital valorizaram-se as unidades garden e coberturas.&rdquo;</p>\r\n\r\n<p>D&eacute;ficit habitacional</p>\r\n\r\n<p>O executivo tamb&eacute;m chama a aten&ccedil;&atilde;o para a resili&ecirc;ncia de programas como o Casa Verde e Amarela, um mercado que, de acordo com &nbsp;ele, &ldquo;ficou inc&oacute;lume &agrave; crise&rdquo;, especialmente por causa do d&eacute;ficit habitacional, que, segundo<strong>&nbsp;</strong>a Secretaria de Estado da Habita&ccedil;&atilde;o de S&atilde;o Paulo, demandaria a constru&ccedil;&atilde;o de mais de 4 milh&otilde;es de moradias.</p>\r\n\r\n<p>Ao novo prefeito de S&atilde;o Paulo que assumir o cargo depois das elei&ccedil;&otilde;es do segundo turno, Vivanco faria dois pedidos. O primeiro deles &eacute; uma revis&atilde;o do Plano Diretor Estrat&eacute;gico do Munic&iacute;pio de S&atilde;o Paulo, em vigor desde meados de 2014. &ldquo;O plano tem boas inten&ccedil;&otilde;es e trouxe boas ideias, mas precisa de ajustes&rdquo;, diz o executivo. &ldquo;N&atilde;o faz sentido, por exemplo, que os pr&eacute;dios tenham um limite de gabarito [<em>andares</em>] t&atilde;o baixo em uma cidade como S&atilde;o Paulo.&rdquo; Vivanco defende que a mudan&ccedil;a permitiria &ldquo;uma cidade mais perme&aacute;vel, ensolarada e com melhor circula&ccedil;&atilde;o de ar&rdquo;.</p>\r\n\r\n<p>Outro ponto importante na vis&atilde;o de Vivanco &eacute; a retomada das Opera&ccedil;&otilde;es Urbanas, que estabelecem regras urban&iacute;sticas e incentivos ao adensamento populacional e construtivo para determinada &aacute;rea da cidade. Destravar as Opera&ccedil;&otilde;es Urbanas &eacute; uma alternativa que o prefeito tem para fomentar emprego, distribuir renda e colher impostos que podem ser revertidos n&atilde;o s&oacute; para a melhoria da regi&atilde;o como tamb&eacute;m para a sa&uacute;de e a educa&ccedil;&atilde;o&rdquo;. Diante do entusiasmo do setor e da possibilidade de revis&atilde;o desses pontos, Vivanco<strong>&nbsp;</strong>se mostra otimista. &ldquo;Tudo indica que o mercado imobili&aacute;rio ter&aacute; um ciclo virtuoso importante.&rdquo;</p>\r\n', 'Revista Exame', '60509da9abf87uo4eh8.png', 'S', 'administrador'),
(4, 0, '2021-03-16 09:02:43', '2021-07-15 09:37:29', 'kallas-arkhes-acelera-lancamentos-de-imoveis-em-sp', 'Kallas Arkhes acelera lançamentos de imóveis em SP', 'Com a proposta de promover a integração entre as pessoas e os espaços urbanos, a construtora aposta em empreendimentos voltados para famílias', '<p>A pandemia e o isolamento social fizeram com que as construtoras acabassem adiando boa parte dos lan&ccedil;amentos previstos para o primeiro semestre deste ano. A boa not&iacute;cia &eacute; que, segundo dados da Associa&ccedil;&atilde;o Brasileira de Incorporadoras Imobili&aacute;rias (Abrainc), que j&aacute; apontavam uma concentra&ccedil;&atilde;o maior de lan&ccedil;amentos horizontais entre julho e dezembro, 97% das construtoras pretendem lan&ccedil;ar empreendimentos imobili&aacute;rios nos pr&oacute;ximos 12 meses.</p>\r\n\r\n<p>&Eacute; o caso da construtora&nbsp;<strong>Arkhes, do Grupo Kallas</strong>. Com a reabertura dos estandes e com a digitaliza&ccedil;&atilde;o do setor, que permite que muitas das etapas da compra de um im&oacute;vel &ndash; da visita &agrave; assinatura do contrato &ndash; sejam feitas de maneira virtual, a construtora pretende lan&ccedil;ar nove empreendimentos at&eacute; dezembro. &ldquo;A pandemia despertou nas pessoas a necessidade de morar bem. Elas n&atilde;o v&atilde;o mais para casa &lsquo;s&oacute; para dormir&rsquo;. O lar, agora, virou um recanto&rdquo;, diz Thiago Kallas, CEO da Arkhes.</p>\r\n\r\n<p><strong>Adeus, um dormit&oacute;rio</strong></p>\r\n\r\n<p>Apesar de ter um portf&oacute;lio com op&ccedil;&otilde;es que v&atilde;o do alto padr&atilde;o ao econ&ocirc;mico, a construtora prev&ecirc;, daqui para a frente, o lan&ccedil;amento de im&oacute;veis maiores, com foco nas fam&iacute;lias. &ldquo;O Plano Diretor fez com que muitas empresas optassem pelo lan&ccedil;amento de est&uacute;dios e apartamentos de um dormit&oacute;rio em S&atilde;o Paulo. Eles atra&iacute;ram muitos investidores, mas t&ecirc;m data de validade, pois acabam sendo tempor&aacute;rios&rdquo;, afirma Kallas.</p>\r\n\r\n<p>O executivo tamb&eacute;m acredita em uma mudan&ccedil;a de perfil na busca do im&oacute;vel por causa da pandemia e de um movimento de interioriza&ccedil;&atilde;o. &ldquo;Quem trabalha no escrit&oacute;rio s&oacute; alguns dias da semana est&aacute; propenso a escolher um ponto de estadia na capital e uma casa bacana em munic&iacute;pios como Granja Viana, Alphaville ou Aldeia da Serra&rdquo;, diz Kallas.</p>\r\n\r\n<p>Do lado da construtora, a estrat&eacute;gia tamb&eacute;m mudou. A inaugura&ccedil;&atilde;o de estandes de vendas, por exemplo, n&atilde;o acontece mais aos s&aacute;bados e domingos, como era o costume, mas, sim, durante a semana. &ldquo;Antes, faz&iacute;amos um &lsquo;au&ecirc;&rsquo; no lan&ccedil;amento e depois o cliente desistia da compra&rdquo;, lembra Kallas. Com as ferramentas digitais, os consumidores passaram a usar mais recursos para conhecer antecipadamente os empreendimentos, como o tour virtual e a pr&oacute;pria divulga&ccedil;&atilde;o no site da empresa e nas redes sociais. Com isso, os estandes assumiram o papel de plant&atilde;o de d&uacute;vidas de clientes mais propensos a, de fato, fechar a compra. &ldquo;A pandemia quintuplicou os leads mensais de pessoas interessadas em nossos im&oacute;veis&rdquo;, diz o executivo.</p>\r\n\r\n<p><strong>Jornada do cliente</strong></p>\r\n\r\n<p>Tra&ccedil;ar a jornada dos clientes &eacute; mais uma das estrat&eacute;gias usadas pela Kallas para ser assertiva em seus lan&ccedil;amentos. Com informa&ccedil;&otilde;es a respeito de futuros moradores, como renda, deslocamentos, lugares que costumam frequentar, e necessidade ou n&atilde;o de escolas pr&oacute;ximas, &eacute; poss&iacute;vel planejar o tipo de empreendimento que mais se adequa ao p&uacute;blico e &agrave; regi&atilde;o.</p>\r\n\r\n<p>Com base nesse estudo, a construtora tem conseguido obter sucesso em lan&ccedil;amentos como o Verit&aacute;s, no concorrido bairro da Vila Madalena, em S&atilde;o Paulo. Em apenas uma semana, o empreendimento, com apartamentos de 163 a 297 metros quadrados e a uma dist&acirc;ncia de 500 metros do metr&ocirc; Sumar&eacute;, teve 30% das unidades vendidas. &ldquo;Passamos meses debru&ccedil;ados sobre a fachada, a planta e as &aacute;reas comuns dos nossos projetos. Tudo para que as pessoas, quando entrarem em suas casas, se sintam no melhor lugar do mundo&rdquo;, diz Kallas.</p>\r\n\r\n<p><strong>Condom&iacute;nios-clube</strong></p>\r\n\r\n<p>Com a pandemia, a construtora identificou a chance de fazer grandes empreendimentos em bairros terci&aacute;rios, como Butant&atilde;, Vila Ema e Vila das Merc&ecirc;s, que ainda n&atilde;o t&ecirc;m a valoriza&ccedil;&atilde;o m&aacute;xima, e onde &eacute; poss&iacute;vel construir grandes condom&iacute;nios-clube. &ldquo;Nossa meta &eacute; fazer empreendimentos incr&iacute;veis em bairros mais desejados e condom&iacute;nios-clube em bairros onde h&aacute; disponibilidade de terrenos maiores&rdquo;, diz o executivo.</p>\r\n\r\n<p>Essa vis&atilde;o se d&aacute; n&atilde;o s&oacute; em raz&atilde;o da mudan&ccedil;a de comportamento dos consumidores como tamb&eacute;m das restri&ccedil;&otilde;es urbanas impostas em S&atilde;o Paulo e que geram o subaproveitamento dos poucos terrenos dispon&iacute;veis na cidade. &ldquo;O setor imobili&aacute;rio ainda enfrenta a resist&ecirc;ncia &lsquo;<em>not in my backyard</em>&rsquo; [&lsquo;n&atilde;o no meu quintal&rsquo;]. O ego&iacute;smo daqueles que j&aacute; moram exclui os que teriam o direito de tamb&eacute;m morar&rdquo;, diz o executivo. &ldquo;As pessoas querem exclusividade. Entram com a&ccedil;&otilde;es e representa&ccedil;&otilde;es no Minist&eacute;rio P&uacute;blico. Tentam embargar empreendimentos legalmente aprovados e, com isso, impedem o aumento da oferta de moradias.&rdquo;<br />\r\n<br />\r\nNo livro&nbsp;<em>Os Centros Urbanos &ndash; A Maior Inven&ccedil;&atilde;o da Humanidade</em>, Edward Glaeser, professor de economia na universidade americana de Harvard, destaca justamente essa quest&atilde;o. Na opini&atilde;o dele, cada vez que se pro&iacute;be a constru&ccedil;&atilde;o de novos pr&eacute;dios, a cidade se torna mais cara e excludente, o que leva &agrave; cria&ccedil;&atilde;o de favelas e ocupa&ccedil;&otilde;es ilegais no entorno. Em seu estudo, o professor mostra que a densidade m&eacute;dia de S&atilde;o Paulo &eacute; baixa: 7.500 habitantes por quil&ocirc;metro quadrado, ao contr&aacute;rio de Paris, que tem quase 21.000. &ldquo;O bairro mais adensado da capital &eacute; Sapopemba, com mais de 21.000 habitantes por quil&ocirc;metro quadrado. E l&aacute; quase n&atilde;o h&aacute; pr&eacute;dios, o que comprova, como destacou Glaeser, que adensamento e verticaliza&ccedil;&atilde;o s&atilde;o conceitos diferentes&rdquo;, diz Kallas.</p>\r\n\r\n<p>Enquanto espera por uma revis&atilde;o no Plano Diretor, a construtora segue investindo em projetos que caminhem em harmonia com o que est&aacute; ao seu redor e que ajudem no desenvolvimento da cidade. S&oacute; assim, segundo Kallas, cada um ter&aacute; direito &ldquo;ao seu melhor lugar no mundo&rdquo;.</p>\r\n', 'Revista Exame', '60509e631404aga58p8.png', 'S', 'administrador'),
(5, 0, '2021-03-16 09:04:10', '2021-03-16 09:04:10', 'quintoandar-anuncia-compra-do-portal-especializado-sindiconet', 'QuintoAndar anuncia compra do portal especializado SíndicoNet', 'Companhia especializada em conteúdo e serviços para condomínios vai continuar atuando de forma independente, sem mudança na estrutura operacional', '<p>O QuintoAndar anunciou a compra do S&iacute;ndicoNet, companhia especializada em conte&uacute;do e marketplace de servi&ccedil;os para condom&iacute;nios. Segundo o comunicado, a empresa vai continuar atuando de forma independente, sem mudan&ccedil;as em sua estrutura operacional. Com isso, o fundador do S&iacute;ndicoNet, Julio Paim, e os co-fundadores Marjorie Albuquerque e Andr&eacute; Agostinho continuar&atilde;o &agrave; frente do neg&oacute;cio, que receber&aacute; investimentos para acelerar expans&atilde;o e ampliar oferta de servi&ccedil;os para condom&iacute;nios.</p>\r\n\r\n<p>O investimento, cujo valor n&atilde;o foi divulgado, tem o objetivo de unir a experi&ecirc;ncia e a rede de relacionamento e de parceiros do S&iacute;ndicoNet com a cultura de inova&ccedil;&atilde;o da nova controladora. &ldquo;Essa &eacute; uma oportunidade &uacute;nica para o S&iacute;ndicoNet. Vamos absorver e trocar muito conhecimento e experi&ecirc;ncias com o QuintoAndar, que &eacute; refer&ecirc;ncia em inova&ccedil;&atilde;o e vis&atilde;o de mercado&rdquo;, diz Paim.<br />\r\n<br />\r\nHoje, o Quinto Andar tem mais de 30 bilh&otilde;es de reais em ativos sob sua administra&ccedil;&atilde;o e opera em 30 cidades nas nove principais regi&otilde;es metropolitanas do pa&iacute;s. Enquanto isso, o S&iacute;ndicoNet recebe mais de 1 milh&atilde;o de visitas por m&ecirc;s, al&eacute;m de promover a capacita&ccedil;&atilde;o de s&iacute;ndicos e controlar o CoteiBem, um marketplace para cota&ccedil;&otilde;es de servi&ccedil;os de manuten&ccedil;&atilde;o e gest&atilde;o predial com mais de 5.000 fornecedores catalogados e avaliados por s&iacute;ndicos e administradoras de condom&iacute;nios em mais de 200 cidades do Brasil.</p>\r\n\r\n<p>&ldquo;O QuintoAndar tem muito a oferecer, em termos de tecnologia e conhecimento, para que o S&iacute;ndicoNet possa consolidar ainda mais sua hist&oacute;ria de 20 anos no mercado&rdquo;, diz Gabriel Braga, CEO e co-fundador do QuintoAndar. &ldquo;A experi&ecirc;ncia deles &eacute; a sua principal for&ccedil;a e estamos confiantes que, com nosso apoio, o S&iacute;ndicoNet vai poder oferecer um servi&ccedil;o ainda melhor a seus clientes.&rdquo;</p>\r\n', 'Revista Exame', '60509eba6456dvloktk.png', 'S', 'administrador'),
(6, 0, '2021-03-16 09:06:21', '2021-03-16 09:06:21', 'feirao-online-tera-imoveis-com-valores-partir-de-100000-reais', 'Feirão online terá imóveis com valores partir de 100.000 reais', 'Evento, que acontece entre os dias 20 e 28 de novembro, contará com a participação de 50 construtoras e da Caixa Econômica Federal', '<p>A&nbsp; Associa&ccedil;&atilde;o Brasileira de Incorporadoras Imobili&aacute;rias (Abrainc) e a C&acirc;mara Brasileira da Ind&uacute;stria da Constru&ccedil;&atilde;o Civil (CBIC) ir&atilde;o realizar, entre os dias 20 e 28 de novembro, a Feira de Im&oacute;veis Online, evento que este ano acontecer&aacute; de forma virtual por conta da pandemia. Ao todo, ser&atilde;o ofertados mais de 5.000 im&oacute;veis de 50 construtoras em 150 cidades brasileiras. &ldquo;O mercado imobili&aacute;rio j&aacute; vinha mudando, mas a pandemia nos mostrou que digitaliza&ccedil;&atilde;o &eacute; quest&atilde;o de sobreviv&ecirc;ncia para as empresas&rdquo;, diz Jos&eacute; Carlos Martins, presidente da CBIC.</p>\r\n\r\n<p><strong>Im&oacute;veis de at&eacute; 1,5 milh&atilde;o de reais</strong></p>\r\n\r\n<p>Segundo os organizadores, ser&atilde;o ofertados im&oacute;veis com valores entre 100.000 reais e 1,5 milh&atilde;o de reais. O p&uacute;blico esperado &eacute; tanto de consumidores de baixa renda atra&iacute;dos por empreendimentos do Programa Casa Verde e Amarela, quanto de compradores que procuram casas ou apartamentos maiores para morar ou investir. &ldquo;Uma das vantagens da Feira de Im&oacute;veis Online ser&aacute; a disposi&ccedil;&atilde;o das incorporadoras em disputar clientes num ambiente virtual saud&aacute;vel e seguro para a realiza&ccedil;&atilde;o de neg&oacute;cios&rdquo;, diz Luiz Antonio Fran&ccedil;a, presidente da Abrainc.</p>\r\n\r\n<p>Algumas das construtoras participantes prometem custear o Imposto sobre Transfer&ecirc;ncia de Bens Im&oacute;veis (ITBI), enquanto outras afirmam que ir&atilde;o oferecer aos clientes benef&iacute;cios com piso de qualidade superior, churrasqueira, bancada e pia na varanda. A feira contar&aacute; tamb&eacute;m com a participa&ccedil;&atilde;o da Caixa Econ&ocirc;mica Federal para acelerar o processo de an&aacute;lise de condi&ccedil;&otilde;es de financiamento imobili&aacute;rio. A</p>\r\n\r\n<p>Feira do Im&oacute;vel Online contar&aacute; com atra&ccedil;&otilde;es como o cantor Mumuzinho e o comediante Marcelo Marrom. Durante as lives, eles v&atilde;o falar dos im&oacute;veis dispon&iacute;veis e indicar QR Codes para que os interessados possam acessar as ofertas. A expectativa dos organizadores &eacute; de que o evento alcance 10 milh&otilde;es de pessoas em todo pa&iacute;s. Os im&oacute;veis estar&atilde;o dispon&iacute;veis mais pr&oacute;ximo do evento neste&nbsp;<a href=\"https://feiradeimoveisonline.com.br/\">link.</a></p>\r\n', 'Revista Exame', '60509f3d2d095liveo9.png', 'S', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_noticias_fotos`
--

CREATE TABLE `tb_noticias_fotos` (
  `id` int NOT NULL,
  `id_registro` int NOT NULL,
  `id_ordem` int NOT NULL DEFAULT '1',
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(255) NOT NULL,
  `login_usuario` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_noticias_fotos`
--

INSERT INTO `tb_noticias_fotos` (`id`, `id_registro`, `id_ordem`, `data_criacao`, `foto`, `login_usuario`) VALUES
(21, 6, 0, '2021-03-16 09:14:59', '6050a14373049hbcnxk.jpg', 'administrador'),
(22, 6, 0, '2021-03-16 09:14:59', '6050a14373431ow3je1.jpg', 'administrador'),
(23, 6, 0, '2021-03-16 09:14:59', '6050a14373c01bmqrn7.jpg', 'administrador'),
(24, 6, 0, '2021-03-16 09:14:59', '6050a143747b9b72k89.jpg', 'administrador'),
(25, 6, 0, '2021-03-16 09:14:59', '6050a14374f89dyibal.jpg', 'administrador'),
(26, 6, 0, '2021-03-16 09:44:07', '6050a8179531dpnzpwk.jpg', 'administrador'),
(27, 6, 0, '2021-03-16 09:44:45', '6050a83d56fa4onrdie.jpg', 'administrador'),
(28, 8, 0, '2021-07-14 08:17:58', '60eec7e6c4054r238y1.jpg', 'administrador'),
(29, 8, 0, '2021-07-14 08:17:58', '60eec7e6c447569nmgz.jpg', 'administrador'),
(30, 8, 0, '2021-07-14 08:17:58', '60eec7e6c4b71xrd466.jpg', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_edicao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `status` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `data_criacao`, `data_edicao`, `nome`, `login`, `password`, `email`, `status`) VALUES
(1, '2021-03-13 10:36:47', '2021-03-13 10:36:47', 'Administrador', 'administrador', 'VDJhM20wITc=', 'contato@johndanilo.com.br', 'S'),
(2, '2021-03-13 11:10:03', '2021-07-15 09:17:44', 'Imobiliaria', 'imobiliaria', 'aW1vYmlsaWFyaWFAMjAyMQ==', 'contato@imobiliaria.com.br', 'S'),
(3, '2021-03-13 11:18:43', '2021-04-13 11:25:01', 'Demo', 'demo', 'ZGVtb0AxMjM=', 'demo@demo.com.br', 'S');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_banners`
--
ALTER TABLE `tb_banners`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_configuracao`
--
ALTER TABLE `tb_configuracao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_estatisticas`
--
ALTER TABLE `tb_estatisticas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_financiadores`
--
ALTER TABLE `tb_financiadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_imoveis_adicionais`
--
ALTER TABLE `tb_imoveis_adicionais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `tb_imoveis_anuncios`
--
ALTER TABLE `tb_imoveis_anuncios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `tb_imoveis_bairros`
--
ALTER TABLE `tb_imoveis_bairros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_imoveis_cidades`
--
ALTER TABLE `tb_imoveis_cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_imoveis_corretores`
--
ALTER TABLE `tb_imoveis_corretores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_imoveis_estatisticas`
--
ALTER TABLE `tb_imoveis_estatisticas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_imoveis_finalidade`
--
ALTER TABLE `tb_imoveis_finalidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_imoveis_fotos`
--
ALTER TABLE `tb_imoveis_fotos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `tb_imoveis_tipos`
--
ALTER TABLE `tb_imoveis_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_imoveis_transacao`
--
ALTER TABLE `tb_imoveis_transacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_institucional`
--
ALTER TABLE `tb_institucional`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_institucional_fotos`
--
ALTER TABLE `tb_institucional_fotos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `tb_newsletter`
--
ALTER TABLE `tb_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_noticias`
--
ALTER TABLE `tb_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_noticias_fotos`
--
ALTER TABLE `tb_noticias_fotos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_banners`
--
ALTER TABLE `tb_banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_configuracao`
--
ALTER TABLE `tb_configuracao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_estatisticas`
--
ALTER TABLE `tb_estatisticas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_financiadores`
--
ALTER TABLE `tb_financiadores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_adicionais`
--
ALTER TABLE `tb_imoveis_adicionais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_anuncios`
--
ALTER TABLE `tb_imoveis_anuncios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_bairros`
--
ALTER TABLE `tb_imoveis_bairros`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_cidades`
--
ALTER TABLE `tb_imoveis_cidades`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_corretores`
--
ALTER TABLE `tb_imoveis_corretores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_estatisticas`
--
ALTER TABLE `tb_imoveis_estatisticas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_finalidade`
--
ALTER TABLE `tb_imoveis_finalidade`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_fotos`
--
ALTER TABLE `tb_imoveis_fotos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_tipos`
--
ALTER TABLE `tb_imoveis_tipos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_imoveis_transacao`
--
ALTER TABLE `tb_imoveis_transacao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_institucional`
--
ALTER TABLE `tb_institucional`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_institucional_fotos`
--
ALTER TABLE `tb_institucional_fotos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `tb_newsletter`
--
ALTER TABLE `tb_newsletter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_noticias`
--
ALTER TABLE `tb_noticias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_noticias_fotos`
--
ALTER TABLE `tb_noticias_fotos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
