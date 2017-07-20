<?php
namespace PortaSwitch;

class PortaSwitch 
{
		/**
		 * Set required variables
		 */
		public function __construct()
		{
        $this->api_base     = getenv( 'API_BASE' );
        $this->api_user     = getenv( 'API_USER' );
        $this->api_pass     = getenv( 'API_PASS' );
        $this->ch_opts      = [];
        $this->debug        = false;
        $this->error        = '';
        $this->ch           = '';
        $this->session_file = '/tmp/session.txt';
				$this->data         = [ 'auth_info' => json_encode( [ 'session_id' => $this->get_session() ]), ];
		}
		/**
		 * Just an alias for get_session()
		 * 
		 * @return string Auth session ID
		 */
		public function login( )
		{
			return $this->get_session();
		}
		/**
		 * Check if the previous command had an error.
		 * 	
		 * @return boolean [description]
		 */
		public function is_error() 
		{
				$json = json_decode( $this->response );
				if( $json->faultstring )
				{
						$this->error = $json->faultstring;
					return true;
				}
			return false;

		}
		/**
		 * Get the contents of the $this->error variable.
		 * 
		 * @return string The clean error message from the API server
		 */
		public function get_error()
		{
			return $this->error;
		}
		/**
		 * Save the session into session_file
		 * 
		 * @param  string $id Auth Session ID
		 * @return void  
		 */
		public function save_session( $id )
		{
				file_put_contents(  $this->session_file , $id );
		}
		/**
		 * Get the session ID from session_file if it 
		 * exists, if not - create a new one, save the
		 * session ID in it and return the contents
		 * 
		 * @return string   Auth Session ID
		 */
		public function get_session()
		{
				if( file_exists( $this->session_file ) )
				{
						$session = file_get_contents(  $this->session_file  );
						if( !empty( $session ) )
							return $session;
				}
				$post_data  = [ 'params' => json_encode( [ 'user' => $this->api_user, 'password' => $this->api_pass ] ) ];
				$response 	= $this->curl( 'Session/login', $post_data );
				$json 			= json_decode( $response  );
				$session 	  = $json->session_id;
				$this->save_session( $session );
			return $session;
		}
		/**
		 * Perform a CURL request and return response
		 * 
		 * @param  string $service URL of the service
		 * @param  array  $data    The data to be sent to the API
		 * @return string  response from the API
		 */
		public function curl( $service, $data = [] )
		{
				$this->ch  																= curl_init();
				$this->ch_opts[ CURLOPT_URL ] 						= $this->api_base .'/'. $service;
				$this->ch_opts[ CURLOPT_VERBOSE ] 				= ( $this->debug ? true : false );
				$this->ch_opts[ CURLOPT_RETURNTRANSFER ] 	= true;
				$this->ch_opts[ CURLOPT_POST ] 						= true;
				$this->ch_opts[ CURLOPT_POSTFIELDS ] 			= $data;
				curl_setopt_array( $this->ch, $this->ch_opts );
				$this->response = curl_exec( $this->ch );
			return $this->response;
		}
}


