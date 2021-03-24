<?php
require 'lib/nusoap.php';

function get_price($name)
{
	$products = [
		'buku' => 20, 
        'ballpoint' => 10, 
        'pensil' => 5
	];
	
	foreach($products as $product=>$price)
	{
		if($product==$name)
		{
			return $price;
			break;
		}
	}
}


$server = new nusoap_server();
$server->configureWSDL("Soap Demo","urn:soapdemo");
$server->register(
	"get_price", 
	array("name"=>"xsd:string"),
	array("return"=>"xsd:integer")
);

$server->service(file_get_contents("php://input"));