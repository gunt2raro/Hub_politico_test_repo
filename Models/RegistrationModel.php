<?php


	class RegistrationModel{

		private $username;
		private $password;
		private $passwordmd5;
		private $email;
		private $lastname;
		private $name;
		private $errors;


		public function __construct( $errors, $username, $password, $name, $lastname, $email, $token ){

			$this->errors = $errors;
			$this->username = $username;
			$this->password = $password;
			$this->name = $name;

			$this->lastname = $lastname;
			$this->email = $email;
			$this->token = $token;

		}//End of construct function

		/*
		* register
		* function that allows to register user on the database
		*/
		public function register(  ){

			$r = new HttpRequest( 'http://162.243.154.28:4550/registration', HttpRequest::METH_POST );
			//$r->setOptions( array( 'cookies' => array( 'lang' => 'es' ) ) );
			$r->addPostFields( array( 'username' => $this->username, 'password' => $this->password, 'real_name' => $this->name, 'lastname' => $this->lastname, 'email' => $this->email ) );

			try{

				print( $r->send()->getBody() );

			} catch( HttpException $ex ){

				$this->errors[] = "Registro Fallido. Vuelve a intentarlo";
				print( $ex );

			}

		}//End of register function

	}//End of registration model
?>
