<?php
namespace PortaSwitch;

class DID extends PortaSwitch
{
	/**
	 * Get the information related to the $number
	 * 
	 * @param  int $number DID number
	 * @return string         The API response
	 */
		public function get_number_info( $number )
		{
				$this->data['params'] = json_encode([ 'number' => $number ]);
	    return $this->curl( 'DID/get_number_list', $this->data );
		}
		/**
		 * Get the list of number
		 * 
		 * @return string The API response
		 */
		public function get_number_list()
		{
	    return $this->curl( 'DID/get_number_list', $this->data );
		}
		/**
		 * Reserve the number
		 * 
		 * @param  int $number The number to be reserved
		 * @return string  The API response
		 */
		public function reserve_number( $number )
		{
			$this->data['params'] = json_encode([ 'number' => $number ]);
	    return $this->curl( 'DID/reserve_number', $this->data );
		}
		/**
		 * This method allows an API user to assign a DID number 
		 * to a customer’s account.
		 * @param  int $customer   ID of the customer
		 * @param  int $did_number ID of the DID number
		 * @return string 	The API response
		 */
		public function assign_did_to_account( $did_number, $customer )
		{
				$this->data['params'] = json_encode([ 'i_customer' => $customer, 'i_did_number' => $did_number ]);
	    return $this->curl( 'DID/assign_did_to_account', $this->data );
		}
		/**
		 * This method allows an API user to delete a DID 
		 * number from the DID inventory.
		 * 
		 * @param  int $did_number The DID number to be deleted
		 * @return string    The API response
		 */
		public function delete_number( $did_number )
		{
			$this->data['params'] = json_encode([ 'i_did_number' => $did_number ]);
	    return $this->curl( 'DID/did_number', $this->data );
		}
		/**
		 * This method allows an API user to assign DID to customer.
		 * 
		 * @param  int $customer   The Customer ID
		 * @param  int $did_number The DID number
		 * @return string 	The API response
		 */
		public function assign_did_to_customer( $customer, $did_number )
		{
			$this->data['params'] = json_encode([ 'i_customer' => $customer, 'i_did_number' => $did_number ]);
	    return $this->curl( 'DID/assign_did_to_customer', $this->data );
		}
		/**
		 * This method allows an API user to obtain the list of DID numbers
		 * owned by him. An administrator can obtain the list of DID numbers
		 * owned by a retail customer (but not a reseller).
		 * 
		 * @param  int $customer Customer ID
		 * @param  int $account  Account ID
		 * @return string     The API response
		 */
		public function get_customer_numbers( $customer, $account )
		{
			$this->data['params'] = json_encode([ 'i_customer' => $customer, 'i_account' => $account ]);
	    return $this->curl( 'DID/get_customer_numbers', $this->data );
		}
		/**
		 * Get the vendor batch list
		 * 
		 * @return string The API response
		 */
		public function get_vendor_batch_list()
		{
	    return $this->curl( 'DID/get_vendor_batch_list', $this->data );
		}
}
