<?php

require_once "vendor/autoload.php";

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$faker = Faker\Factory::create();

// $customer_info = [ 	'name' => $faker->name, 'iso_4217' => 'USD' ];
// $a = new PortaSwitch\Account();
// echo $a->add( $customer_info );


// $c = new PortaSwitch\Customer();
// echo $c->get_list() ."\n";

for( $i = 0; $i <= 9; $i++ )
{
  echo $faker->macAddress." -> ". $faker->name ." -> ". $faker->address ."\n";
}
exit;

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
