<?php


	/*
	* LoginModel
	* Class model that mamages all of the login shit
	*/
	class LoginModel{

		private $_userid;
		private $_username;
		private $_password;
		private $_passwordmd5;

		private $_token;
		private $_access;
		private $_login;
		private $_errors;

		/*
		* __construct
		* function that works as a constructor
		*/
		public function __construct(){

			$this->_errors = array();
			$this->_access = 0;
			$this->_login = isset( $_POST['login'] ) ? 1 : 0;
			$this->_token = $_POST['token'];

			$this->_userid = 0;
			$this->_username = ($this->_login) ? $_POST['username'] : $_SESSION['username'];
			$this->_password = ($this->_login) ? $_POST['password'] : '';
			$this->_passwordmd5 = ($this->_login ) ? md5( $this->_password ) : $_SESSION['password'];

		}//End of constructor function

		public function is_logged_in(){

			($this->_login) ? $this->verify_post() : $this->verify_session();

			return $this->_access;

		}//End of is_logged_in function

		public function filter( $var ){

			return preg_replace( '/[^a-zA-Z0-9]/', '', $var );

		}//End of filter function

		public function verify_post(){

			try{

				if( !$this->is_token_valid() ){

					throw new Exception( 'Autentificación no valida.' );

				}
				if( !$this->verify_server() ){

					throw new Exception( 'Usuario o contraseña no validos. Intentelo de nuevo.' );

				}

				$this->_access = 1;
				$this->register_session();

			}catch( Exception $ex ){

				$this->_errors[] = $ex->getMessage();

			}

		}//End of verify_post function

		public function verify_session(){

			if( $this->session_exist() ){

				$this->_access = 1;

			}

		}//End of verify_session function

		public function verify_server(){

			$r = new HttpRequest( 'http://162.243.154.28:4550/login', HttpRequest::METH_POST );
			//$r->setOptions( array( 'cookies' => array( 'lang' => 'es' ) ) );
			$r->addPostFields( array( 'username' => $this->_username, 'password' => $this->_password ) );

			try{

				$resp = json_decode( $r->send()->getBody(), true );

				print_r( $resp );

				if( $resp != NULL ){

					if ( array_key_exists( 'username', $resp ) ) {

						if( $resp['username'] == $this->_username ){

							return true;

						}else{

							return false;

						}

					} else {//if( array_key_exists( 'message', $resp ) ){

						$this->_errors[] = $resp['message'];

						return false;

					}

				}

			} catch( HttpException $ex ){

				$this->errors[] = "Autentificación fallida, intentelo de nuevo. :(";

				return false;

			}

		}//End of verfify_server function

		public function is_data_valid(){

			return ( preg_match( '/^[a-zA-Z0-9](5, 12)$/', $this->_username ) && preg_match( '/^[a-zA-Z0-9](5, 12)$/', $this->_password)) ? 1 : 0;

		}//End of is_data_valid function

		public function is_token_valid(){

			return ( !isset( $_SESSION['token'] ) || $this->_token != $_SESSION['token'] ) ? 0 :1;

		}//End of is_token_valid function

		public function register_session(){

			$_SESSION['username'] = $this->_username;
			$_SESSION['password'] = $this->_passwordmd5;

		}//End of register_session function

		public function session_exist(){

			return ( isset($_SESSION['username']) && isset( $_SESSION['password'] ) ) ? 1 : 0;

		}//End of session_exists function

		public function show_errors(){

			print( "<h3>Errores</h3><br />" );

			foreach( $this->_errors as $key=>$value ){

				print( $value . "<br />" );

			}

		}//End of show_errors function

	}//End of LoginModel

?>
