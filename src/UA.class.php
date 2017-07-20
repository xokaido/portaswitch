<?php
namespace PortaSwitch;

class UA extends PortaSwitch
{
		/**
		 * This method allows an API user (administrator or reseller) to get the list
		 * of UA devices (IP phones) in the IP phone inventory, filtered by various
		 * parameters.
		 * 
		 * @return string The response from the API
		 */
		public function get_list()
		{
	    return $this->curl( 'UA/get_ua_list', $this->data );
		}
		/**
		 * This method allows an API user to add a new UA device (IP phone) to
		 * the IP phone inventory.
		 * 			 
		 * @param array $ua_info 
		 */
		public function add( $ua_info = [])
		{
				$this->data['params'] = json_encode( [ 'ua_info' => $ua_info ]);
	    	$this->curl( 'UA/add_ua', $this->data );
	    	if( $this->is_error() )
	    		return false;
	    	return true;
		}
		/**
		 * This method allows an API user to delete a UA device, provided that it is
		 * not being used by any account.
		 * 
		 * @param  int $i_ua ID of the UA
		 * @return string       The API response
		 */
		public function delete( $i_ua )
		{
				$this->data['params'] = json_encode( [ 'i_ua' => $i_ua ]);
	    return $this->curl( 'UA/delete_ua', $this->data );
		}
}
