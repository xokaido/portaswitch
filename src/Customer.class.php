<?php
namespace PortaSwitch;

class Customer extends PortaSwitch
{
		/**
		 * Get the list of customers
		 * 
		 * @return string The response from the API
		 */
		public function get_list()
		{
	    return $this->curl( 'Customer/get_customer_list', $this->data );
		}
		/**
		 * Validate the customer information before creating
		 * 	
		 * @param  array $customer_info The customer  data to be checked
		 * @return string                The response from the API
		 */
		public function validate_info( $customer_info = [] )
		{
				$this->data['params'] = json_encode([ 'customer_info' => $customer_info ]);
	    return $this->curl( 'Customer/validate_customer_info', $this->data );
		}
		/**
		 * This method allows an API user to get a customer record from the
		 * database. The customer must be viewable (owned) by the user making the
		 * request.
		 * 
		 * @param  array  $customer_info [description]
		 * @return string                The API response
		 */
		public function get_info( $customer_info = [] )
		{
				$this->data['params'] = json_encode( $customer_info );
	    return $this->curl( 'Customer/get_customer_info', $this->data );
		}
		/**
		 * This method allows an API user to create a new customer record using
		 * the supplied data.
		 * 
		 * @param array $customer_info [description]
		 */
		public function add( $customer_info = [] )
		{
				$this->data['params'] = json_encode([ 'customer_info' => $customer_info ]);
	    	$this->curl( 'Customer/add_customer', $this->data );
	    	if( $this->is_error() )
	    		return false;
	    	return true;
		}
		/**
		 * This method allows an API user to update an existing customer record
		 * using the supplied data.
		 * 
		 * @param  array  $customer_info [description]
		 * @return string                The API response
		 */
		public function update( $customer_info = [] )
		{
        $this->data['params'] = json_encode([ 'customer_info' => $customer_info ]);
	    return $this->curl( 'Customer/update_customer', $this->data );
		}
		/**
		 * This method allows an API user to terminate an existing retail customer
		 * or reseller.
		 * 
		 * @param  array  $customer_info [description]
		 * @return string                The API response
		 */
		public function terminate( $customer_info = [] )
		{
				$this->data['params'] = json_encode( $customer_info );
	    return $this->curl( 'Customer/terminate_customer', $this->data );
		}
		/**
		 * This method allows an API user to delete an existing retail customer or
		 * reseller, provided it has no accounts, subcustomers, CDRs or managed
		 * objects.
		 * 
		 * @param  array  $customer_info [description]
		 * @return string                The API response
		 */
		public function delete( $customer_info = [] )
		{
				$this->data['params'] = json_encode( $customer_info );
	    return $this->curl( 'Customer/delete_customer', $this->data );
		}
		/**
		 * This method allows a customer to change his password.
		 * 
		 * @param  array  $customer_info [description]
		 * @return string                The API response
		 */
		public function change_password( $customer_info = [] )
		{
				$this->data['params'] = json_encode( $customer_info );
	    return $this->curl( 'Customer/change_password', $this->data );
		}
		/**
		 * This method allows to suspend all services to a retail customer, reseller or
		 * distributor.
		 * 
		 * @param  array  $customer_info [description]
		 * @return string                The API response
		 */
		public function suspend( $customer_info = [] )
		{
				$this->data['params'] = json_encode( $customer_info );
	    return $this->curl( 'Customer/suspend_customer', $this->data );
		}
		/**
		 * This method allows to suspend all services to a retail customer, reseller or
		 * distributor.
		 * 
		 * @param  array  $customer_info [description]
		 * @return string  The API response                
		 */
		public function unsuspend( $customer_info = [] )
		{
				$this->data['params'] = json_encode( $customer_info );
	    return $this->curl( 'Customer/unsuspend_customer', $this->data );
		}

}
