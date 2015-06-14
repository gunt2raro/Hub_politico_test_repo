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
		public function __construct( ){

			$this->_errors = array();
			$this->_access = 0;
			$this->_login = isset( $_POST['login'] ) ? 1 : 0;
			$this->_token = $_POST['token'];

			$this->_userid = 0;
			$this->_username = ($this->_login) ? $_POST['username'] : $_SESSION['username'];
			$this->_password = ($this->_login) ? $_POST['password'] : '';
			$this->_passwordmd5 = ($this->_login ) ? md5( $this->_password ) : $_SESSION['password'];

		}//End of constructor function

		public function verify_server(){

			$r = new HttpRequest( 'http://162.243.154.28:4550/login', HttpRequest::METH_POST );
			//$r->setOptions( array( 'cookies' => array( 'lang' => 'es' ) ) );
			$r->addPostFields( array( 'username' => $this->_username, 'password' => $this->_password ) );

			try{

				print( $r->send()->getBody() );

			} catch( HttpException $ex ){

				$this->errors[] = "Autentificación fallida, intentelo de nuevo. :(";
				print( $ex );

			}

		}//End of verfify_server function

	}//End of LoginModel

?>
