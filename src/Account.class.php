<?php
namespace PortaSwitch;

class Account extends PortaSwitch
{
		/**
		 * This method allows an API user to get an account record from the
		 * database. The account must be viewable (owned) by the user making the
		 * request.
		 * 
		 * @param  int $account_id [description]
		 * @return string  curl resonse returned
		 */
		public function get_info( $account_id )
		{
				$this->data['params'] = json_encode([ 'i_account' 	=> $account_id ]);
	    return $this->curl( 'Account/get_account_info', $this->data );
		}
		/**
		 * This method allows an API user to check if the supplied data can be used
		 * to create a new account record or update an existing one. If successful,
		 * the completed data is returned.
		 * 
		 * @param  int $account_info The info to be validated
		 * @return string    The API response
		 */
		public function validate_info( $account_info = [] )
		{
				$this->data['params'] = json_encode([ 'account_info' 	=> $account_info ]);
  	    $this->curl( 'Account/validate_account_info', $this->data );
        if( $this->is_error() )
          return false;
        return true;
		}
		/**
		 * This method allows an API user to get the list of account records. The
		 * account must be viewable (owned) by the user making the request.
		 * 
		 * @param  int $customer_id Customer's ID
		 * @return string  The API response
		 */
		public function get_list( $customer_id )
		{
				$this->data['params'] = json_encode( [ 'i_customer' => $customer_id ]);
	    return $this->curl( 'Account/get_account_list', $this->data );
		}
		/**
		 * This method allows an API user to create a new account record using the
		 * supplied data.
		 * 
		 * @param array $account_info The account information
		 * @return string  The API response
		 */	
		public function add( $account_info = [])
		{
				$this->data['params'] = json_encode( [ 'account_info' => $account_info ]);
  	    $this->curl( 'Account/add_account', $this->data );
        if( $this->is_error() )
          return false;
      return true;
		}
		/**
		 * This method allows an API user to update an existing account record
		 * using the supplied data.
		 * 
		 * @param  array  $account_info The account information
		 * @return string  The API response
		 */
		public function update( $account_info = [])
		{
				$this->data['params'] = json_encode( [ 'account_info' => $account_info ]);
	    return $this->curl( 'Account/update_account', $this->data );
		}
		/**
		 * This method allows an API user to terminate an existing account record.
		 * 
		 * @param  int $account_id The Account ID
		 * @return string  The API response
		 */
		public function terminate( $account_id )
		{
				$this->data['params'] = json_encode( [ 'i_account' => $account_id ]);
	    return $this->curl( 'Account/terminate_account', $this->data );
		}
		/**
		 * This method allows an API user to change his password.
		 * @param  int $account_id The Account ID 
		 * 
		 * @param  string $old_pass   The Old password to be changed
		 * @param  string $new_pass   The new password
		 * @return string  	The API response
		 */
		public function change_password( $account_id, $old_pass, $new_pass )
		{
				$this->data['params'] = json_encode( [ 'i_account' => $account_id, 'old_password' => $old_pass, 'new_password' => $new_pass ]);
	    return $this->curl( 'Account/change_password', $this->data );
		}
		/**
		 * This method allows an API user to get the information about the UA (IP
		 * phone) assigned to account.
		 * 
		 * @param  int $account_id The account ID
		 * @return string  The API response
		 */
		public function get_ua_info( $account_id )
		{
				$this->data['params'] = json_encode( [ 'i_account' => $account_id ]);
	    return $this->curl( 'Account/get_ua_info', $this->data );
		}
		/**
		 * This method allows an API user to assign a UA to an account.
		 * 
		 * @param  int $account_id The account ID
		 * @param  int $ua         The UA 
		 * @param  int $port       The port number (if the type of UA is PortaPhone, the port field is not mandatory )
		 * @return string  The API response
		 */
		public function assign_ua( $account_id, $ua, $port )
		{
				$this->data['params'] = json_encode( [ 'i_account' => $account_id, 'i_ua' => $ua, 'port' => $port ]);
	    return $this->curl( 'Account/assign_ua', $this->data );
		}

}
