<?php

require 'lib/nusoap.php';

$client = new nusoap_client("http://localhost:8888/video_soap/soap_server.php?wsdl");

if(isset($_POST['submit']))
{
    $nama =$_POST['nama'];

    $response = $client->call('get_price', ["name" => $nama]);

    if(empty($response)){
        header("Content-Type: application/json");
        echo json_encode([
            'data' => '', 
            'message' => 'Empty Data'
        ]);
    }else{
        header("Content-Type: application/json");
        echo json_encode([
            'data' => $response, 
            'message' => 'Empty Data'
        ]);
    }
}