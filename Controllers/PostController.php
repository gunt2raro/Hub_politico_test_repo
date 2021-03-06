<?php

	/*
	* PostController
	* Class that works as a post controller
	*/
	class PostController{

		//Global
		private $_content;
		private $_title;
		private $_date;
		private $_state;
		private $_country;
		private $_time;
		private $_userid;

		private $_token;
		private $_errors;
		private $_pettition_state;
		/*
		* __construct
		* function that works as a contructor
		*/
		public function __construct( $args ){

			$this->_errors = array();
			$this->_pettion_state = 0;
			$this->_token = $args[0];
			$this->_content = $args[1];
			$this->_title = $args[2];
			$this->_date = $args[3];
			$this->_state = $args[4];
			$this->_country = $args[5];
			$this->_time = $args[6];
			$this->_userid = $_SESSION['userid'];
		}

		public function petttion_state(){

			return $this->_petttion_state;

		}

		public function verify_post(){

			try{

				if( !$this->is_token_valid() ){

					throw new Exception( 'Autentificación no valida.' );

				}
				if( !$this->verify_server() ){

					throw new Exception( 'Alguna de la información de los campos del post no fue valida.' );

				}
				$this->_pettition_state = 1;

			}catch( Exception $ex ){

				$this->_errors[] = $ex->getMessage();

			}

		}//End of verify_post function

		public function verify_server(){

			$r = new HttpRequest( 'http://162.243.154.28:4550/post', HttpRequest::METH_POST );
			//$r->setOptions( array( 'cookies' => array( 'lang' => 'es' ) ) );
			$params = array(
				'title' => $this->_title,
				'content' => $this->_content,
				'date' => $this->_date,
				'state' => $this->_state,
				'country' => $this->_country,
				'time' => $this->_time,
				'userid' => $this->userid
			);

			$r->addPostFields( $params );

			try{

				$resp = json_decode( $r->send()->getBody(), true );

				print_r( $resp );

				if( $resp != NULL ){

					if( $resp == 'true' ){

						return true;

					}

				}return false;

			} catch( HttpException $ex ){

				$this->errors[] = "Autentificación fallida, intentelo de nuevo. :(";

				return false;

			}

		}//End of verif_server function

		public function is_token_valid(){



		}//End of is_token_valid function

	}//End of PostController Class

?>
