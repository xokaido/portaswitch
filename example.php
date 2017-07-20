<?php
use PortaSwitch;

require_once "vendor/autoload.php";

// $customer_info = [ 	'name' => 'Xokaido T. GNUcious', 'iso_4217' => 'USD' ];
// $a = new PortaSwitch\Account();
// echo $a->add( $customer_info );

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$c = new PortaSwitch\Customer();
echo $c->get_list() ."\n";


$u = new PortaSwitch\UA();
$ua_info = [	'name' 					=> 'xok Created UA',
							'mac' 					=> '09:09:09:ac:ad:ff:ee',
							'profile' 			=> 'some profile',
							'ua_profile_id' => '19'
						];

if( $u->add( $ua_info ) )
	echo "Success!";
else
	echo $u->get_error() ."\n";
