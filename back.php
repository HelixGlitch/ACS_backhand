<?php
include_once 'Rest.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$api = new Rest();
$database = new Database();
$connection = $database->getConnection();

switch($requestMethod){
    case 'POST':
		  $api->insertRequest($connection, $_POST);
		    break;
	  default:
	   header("HTTP/1.0 405 Method Not Allowed");
	   break;

}
 ?>
