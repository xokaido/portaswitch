<?php
namespace PortaSwitch;

class Product extends PortaSwitch
{
   /**
   * This method allows an API user to get the list of products.
   * 
   * @param  int $customer_id The ID of the customer
   * @return string              The API response
   */
    public function get_list( $customer_id )
    {
        $this->data['params'] = json_encode( [ 'i_customer' => $customer_id ]);
      return $this->curl( 'Product/get_product_list', $this->data );
    }
    /**
     * This method allows an API user to get a product record from the
     * database.
     * 
     * @param  int $product_id  The ID of the product
     * @return string             The API response
     */
    public function get_info( $product_id )
    {
        $this->data['params'] = json_encode( [ 'i_product' => $product_id ]);
      return $this->curl( 'Product/get_product_info', $this->data );
    }
    /**
     * This method allows an API user to add a product.
     * 
     * @param array $product_info [description]
     */
    public function add( $product_info = [] )
    {
        $this->data['params'] = json_encode( [ 'product_info' => $product_info ]);
      return $this->curl( 'Product/add_product', $this->data );
    }
    /**
     * This method allows an API user to update an existing product
     * 
     * @param  array  $product_info [description]
     * @return string               The API response
     */
    public function update( $product_info = [] )
    {
        $this->data['params'] = json_encode( [ 'product_info' => $product_info ]);
      return $this->curl( 'Product/update_product', $this->data );
    }
    /**
     * This method allows an API user to delete an existing product.
     * 
     * @param  int $product_id      [description]
     * @return string               The API response
     */
    public function delete( int $product_id  )
    {
        $this->data['params'] = json_encode( [ 'i_product' => $product_id ]);
      return $this->curl( 'Product/delete_product', $this->data );
    }

}
