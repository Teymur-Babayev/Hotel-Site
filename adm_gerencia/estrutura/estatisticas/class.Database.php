<?php
	class Database {
			
			private $dbhost = SERVIDOR;
		 
			private $dbname = BANCO_DADOS;
	
			private $dbuser = USUARIO_DB;
			
			private $dbpassword = SENHA_DB;
			
			private $dbcharset = 'utf8';
			
			private $link;
			
			private $query;
			
			private $conectado;
			
			public function __construct() {
					$this->conectado = false;
			}
			
			public function conectar() {        
					if ( !$this->conectado ) {
							$this->link = new mysqli($this->dbhost,$this->dbuser,$this->dbpassword,$this->dbname);
							$this->link->set_charset($this->dbcharset);
							if ( $this->link->errno ) {
									throw new Exception('Falha ao conectar no banco de dados!');
									exit();
							}
							else {
								 $this->conectado = true; 
							}
					}
			}
	
			public function desconectar() {
					if ( $this->conectado ) {
							$this->link->close();
							$this->conectado = false;
					}
					else {
							throw new Exception(
											"Não foi possível desconectar, ou não há conexão com o banco de dados");
					}
			}
			
			public function obterUltimoId() {
					return mysqli_insert_id();
			}
			
			public function executar( $sql ) {
					$this->link->autocommit( true );
					if( !$this->link->query( $sql ) ) {
							throw new Exception('Falha ao executar procedimento no banco de dados');
					}
			}
	
			public function registrar($sql) {
					$this->link->autocommit(true);
					$resource = $this->link->query( $sql );
					return $this->link->insert_id;
			}
	
			public function listar( $sql ) {
					$this->link->autocommit( true );
					$resource = $this->link->query( $sql );
					$result=array();
					if( $resource ){
							while( $row = $resource->fetch_assoc() ) {
									$result[] = $row;
							}
							return $result;
					}
					else {
							throw new Exception('Falha ao executar pesquisa no banco de dados');
					}
			}  
	}
?>