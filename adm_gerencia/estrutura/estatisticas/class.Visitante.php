<?php
	include_once('class.Database.php');
	
	class Visitante {
	
			private $database = null;
			private $idVisita = null;
	
			public function getIdVisita() {
					return $this->idVisita;
			}
	
			public function __construct() {
					if (!isset($_SESSION["idVisita"]) || empty($_SESSION["idVisita"])) {
							$this->database = new Database();
							$this->rastrear();
							$_SESSION["idVisita"] = $this->idVisita;
					} else {
							$this->idVisita = $_SESSION["idVisita"];
					}
			}
			
	
			protected function rastrear() {
					//Prepare variables
					$visitor_ip = $this->getIP(TRUE);
					$ip_location = $this->geoCheckIP($this->getIP());
					$visitor_domain = $this->getDomain();
					$visitor_lat = $ip_location['geoplugin_latitude'];
					$visitor_lon = $ip_location['geoplugin_longitude'];
					$visitor_precisaoLocalizacao = $ip_location['geoplugin_locationAccuracyRadius'];
					$visitor_fusoHorario = $ip_location['geoplugin_timezone'];
					$visitor_cidade = $ip_location['geoplugin_city'];
					$visitor_estado = $ip_location['geoplugin_region'];
					$visitor_pais = $ip_location['geoplugin_countryName'];
					$visitor_browser = $this->getBrowserType();
					$visitor_lang = $this->getIdioma();
					$visitor_OS = $this->getOS();
					$visitor_referer = $this->getReferer();
					$visitor_page = $this->getRequestURI();
	
					//Gather variables in array
					$visitor = array(
							'ip' => $visitor_ip,
							'navegador' => $visitor_browser,
							'idioma' => $visitor_lang,
							'fuso_horario' => $visitor_fusoHorario,
							'OS' => $visitor_OS,
							'dia_semana' => date('w'),
							'latitude' => $visitor_lat,
							'longitude' => $visitor_lon,
							'cidade' => $visitor_cidade,
							'estado' => $visitor_estado,
							'pais' => $visitor_pais,
							'precisao' => round($visitor_precisaoLocalizacao * 1609.34),
							'referencia' => $visitor_referer,
							'dominio' => $visitor_domain,
							'pagina' => $visitor_page
					);
	
					//Make sure the array isn't empty
					if (empty($visitor)) {
							return false;
					}
	
					//Insert the data
					$sql = "INSERT INTO tb_estatisticas";
					$fields = array();
					$values = array();
	
					foreach ($visitor as $field => $value) {
							$fields[] = $field;
							$values[] = "'" . $value . "'";
					}
					$fields = ' (' . implode(', ', $fields) . ')';
					$values = '(' . implode(', ', $values) . ')';
	
					$sql .= $fields . ' VALUES ' . $values;
					$this->database->conectar();
					$this->idVisita = $this->database->registrar($sql);
					$this->database->desconectar();
			}
	
			private function getIP($getHostByAddr = FALSE) {
					foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
							if (array_key_exists($key, $_SERVER) === true) {
									foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip) {
											if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
													if ($getHostByAddr === TRUE) {
															return getHostByAddr($ip);
													} else {
															return $ip;
													}
											}
									}
							}
					}
			}
	
			private function geoCheckIP($ip) {
					//check, if the provided ip is valid
					if (!filter_var($ip, FILTER_VALIDATE_IP) || $ip == 'localhost') {
							//throw new InvalidArgumentException("IP is not valid");
							return false;
					}
					//contact ip-server
					$response = file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip);
					if (empty($response)) {
							//throw new InvalidArgumentException("Error contacting Geo-IP-Server");
							return false;
					}
					return unserialize($response);
			}
	
			private function getBrowserType() {
					$u_agent = $_SERVER['HTTP_USER_AGENT'];
					$bname = 'Unknown';
					// Next get the name of the useragent yes seperately and for good reason
					if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
							$bname = 'Internet Explorer';
					} elseif (preg_match('/Firefox/i', $u_agent)) {
							$bname = 'Mozilla Firefox';
					} elseif (preg_match('/Chrome/i', $u_agent)) {
							$bname = 'Google Chrome';
					} elseif (preg_match('/Safari/i', $u_agent)) {
							$bname = 'Apple Safari';
					} elseif (preg_match('/Opera/i', $u_agent)) {
							$bname = 'Opera';
					} elseif (preg_match('/Netscape/i', $u_agent)) {
							$bname = 'Netscape';
					}
					return $bname;
			}
	
			private function getIdioma() {
					return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
			}
	
			private function getOS() {
					$user_agent = $_SERVER['HTTP_USER_AGENT'];
					$os_platform = "Unknown OS Platform";
					$os_array = array(
							'/windows nt 6.3/i' => 'Windows 8.1',
							'/windows nt 6.2/i' => 'Windows 8',
							'/windows nt 6.1/i' => 'Windows 7',
							'/windows nt 6.0/i' => 'Windows Vista',
							'/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
							'/windows nt 5.1/i' => 'Windows XP',
							'/windows xp/i' => 'Windows XP',
							'/windows nt 5.0/i' => 'Windows 2000',
							'/windows me/i' => 'Windows ME',
							'/win98/i' => 'Windows 98',
							'/win95/i' => 'Windows 95',
							'/win16/i' => 'Windows 3.11',
							'/macintosh|mac os x/i' => 'Mac OS X',
							'/mac_powerpc/i' => 'Mac OS 9',
							'/linux/i' => 'Linux',
							'/ubuntu/i' => 'Ubuntu',
							'/iphone/i' => 'iPhone',
							'/ipod/i' => 'iPod',
							'/ipad/i' => 'iPad',
							'/android/i' => 'Android',
							'/blackberry/i' => 'BlackBerry',
							'/webos/i' => 'Mobile'
					);
	
					foreach ($os_array as $regex => $value) {
							if (preg_match($regex, $user_agent)) {
									$os_platform = $value;
							}
					}
					return $os_platform;
			}
	
			private function getDate($i) {
					$date = gmdate($i);
					return $date;
			}
	
			private function getReferer() {
					if (!empty($_SERVER['HTTP_REFERER'])) {
							$ref = $_SERVER['HTTP_REFERER'];
							return $ref;
					}
					return false;
			}
	
			private function getRequestURI() {
					if (!empty($_SERVER['REQUEST_URI'])) {
							$uri = $_SERVER['REQUEST_URI'];
							return $uri;
					}
					return false;
			}
	
			private function getDomain() {
					return $_SERVER['HTTP_HOST'];
			}
	
	}
	
	class Google {
			public function Get_Address_From_Google_Maps($latitude, $longitude) {
	
				$key = "AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ";
				$url = "https://maps.google.com/maps/api/geocode/json?address=".$latitude.",".$longitude."&sensor=false&key=".$key;
				
				$data = @file_get_contents($url);
				$jsondata = json_decode($data,true);
				
				if (!$this->check_status($jsondata)) return array();
				
				$address = array(
						'country' => $this->google_getCountry($jsondata),
						'province' => $this->google_getProvince($jsondata),
						'city' => $this->google_getCity($jsondata),
						'street' => $this->google_getStreet($jsondata),
						'postal_code' => $this->google_getPostalCode($jsondata),
						'country_code' => $this->google_getCountryCode($jsondata),
						'formatted_address' => $this->google_getAddress($jsondata),
				);
				
				return $address;
			}
			
			private function check_status($jsondata) {
					if ($jsondata["status"] == "OK") return true;
					return false;
			}
			
			private function google_getCountry($jsondata) {
				return $this->Find_Long_Name_Given_Type("country", $jsondata["results"][0]["address_components"]);
			}
			private function google_getProvince($jsondata) {
					return $this->Find_Long_Name_Given_Type("administrative_area_level_1", $jsondata["results"][0]["address_components"], true);
			}
			private function google_getCity($jsondata) {
					return $this->Find_Long_Name_Given_Type("administrative_area_level_2", $jsondata["results"][0]["address_components"], true);
			}
			 private function google_getStreet($jsondata) {
					return $this->Find_Long_Name_Given_Type("street_number", $jsondata["results"][0]["address_components"]) . ' ' . $this->Find_Long_Name_Given_Type("route", $jsondata["results"][0]["address_components"]);
			}
			private function google_getPostalCode($jsondata) {
					return $this->Find_Long_Name_Given_Type("postal_code", $jsondata["results"][0]["address_components"]);
			}
			private function google_getCountryCode($jsondata) {
					return $this->Find_Long_Name_Given_Type("country", $jsondata["results"][0]["address_components"], true);
			}
			private function google_getAddress($jsondata) {
					return $jsondata["results"][0]["formatted_address"];
			}
			
			private function Find_Long_Name_Given_Type($type, $array, $short_name = false) {
					foreach( $array as $value) {
							if (in_array($type, $value["types"])) {
									if ($short_name)    
											return $value["short_name"];
									return $value["long_name"];
							}
					}
			}
	}
	
	if (isset($_GET['updateLocal'])) {
			$idVisita = isset($_GET['v']) ? trim(stripslashes($_GET['v'])) : null;
			$latitude = isset($_GET['lat']) ? trim(stripslashes($_GET['lat'])) : null;
			$longitude = isset($_GET['lon']) ? trim(stripslashes($_GET['lon'])) : null;
			$precisao = isset($_GET['pre']) ? trim(stripslashes($_GET['pre'])) : null;
			
			// CÓDIGO DE VERIFICAÇÃO DOS DADOS GOOGLE
			$google = new Google();
			$varRecebe = $google->Get_Address_From_Google_Maps($latitude, $longitude);
		
			$qualCidade   = $varRecebe["city"];
			$qualEstado   = $varRecebe["province"];
			$qualPais     = $varRecebe["country"];
			
			if ($idVisita != null && $latitude != null && $longitude != null && $precisao != null) {
					$database = new Database();
					$database->conectar();
					$visita = $database->listar("select tb_estatisticas from visita where id = " . $idVisita);
					if ($visita[0]['precisao'] > $precisao) {
							$database->executar("update tb_estatisticas set latitude = ".$latitude.", longitude = ".$longitude.", cidade = '".$qualCidade."', estado = '".$qualEstado."', pais = '".$qualPais."', precisao = ".round($precisao)." where id = ".$idVisita);
					}
					$database->desconectar();
			}
	}
	
	$visitante = new Visitante();
?>