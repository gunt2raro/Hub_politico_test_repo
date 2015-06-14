<?php


	class RegistrationModel{

		private $username;
		private $password;
		private $passwordmd5;
		private $email;
		private $lastname;
		private $name;
		private $errors;


		public function __construct(){

			$this->errors = array();
			$this->username = $_POST['username'];
			$this->password = $_POST['password'];
			$this->passwordmd5 = md5( $_POST['password'] );
			$this->name = $_POST['real_name'];

			$this->lastname = $_POST['lastname'];
			$this->email = $_POST['email'];
			$this->token = $_POST['token'];

		}//End of construct function

		public function process(){

			if( $this->valid_token() && $this->valid_data() ){

				$this->register();

			}
			return count( $this->errors )? 0 : 1;

		}//End of process function

		public function filter( $var ){

			return preg_replace( '/[^a-zA-Z0-9@.]/', '', $var );

		}//End of filter funcction

		/*
		* register
		* function that allows to register user on the database
		*/
		public function register(  ){

			$r = new HttpRequest( 'http://162.243.154.28:4550/registration', HttpRequest::METH_POST );
			//$r->setOptions( array( 'cookies' => array( 'lang' => 'es' ) ) );
			$r->addPostFields( array( 'username' => $this->username, 'password' => $this->password, 'real_name' => $this->name, 'lastname' => $this->lastname, 'email' => $this->email ) );

			try{

				$resp = json_decode( $r->send()->getBody(), true );

				print_r( $resp );

				if( $resp['username'] == $this->username ){

					$this->register_session();

					return true;

				}else{

					return false;

				}

			} catch( HttpException $ex ){

				$this->errors[] = "Registro Fallido. Vuelve a intentarlo";

				return false;

			}

		}//End of register function

		public function show_errors(){

			print( '<h2>Errores</h2>' );

			foreach( $this->errors as $key=>$value ){

				print( $value.'<br />' );

			}

		}//End of show_errors function

		public function valid_data(){

			if( empty( $this->username ) ){

				$this->errors[] = "El usuario no puede estar vacio.";

			}
			if( empty( $this->password ) ){

				$this->errors[] = "La contraseña no puede estar vacia.";
			}
			if( empty( $this->email ) ){//|| !eregi( '^[a-zA-z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z](2,4))$', $this->email)){

				$this->errors[] = "El email no puede estar vacio.";

			}

			return count( $this->errors )? 0 : 1;

		}//End of valid_data function

		public function valid_token(){

			if( !isset( $_SESSION['token'] ) || $this->token != $_SESSION['token'] ){

				$this->errors[] = 'No se pudo completar el registro. Fromulario no es autentico.';

			}
			return count( $this->errors )? 0 :1;

		}//End of valid_token function

		public function register_session(){

			$_SESSION['username'] = $this->username;
			$_SESSION['password'] = $this->passwordmd5;

		}//End of register_session function

	}
?>
