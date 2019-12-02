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

    case 'GET':
      $api->getScoreboard($connection, $_GET);
        break;

    case 'PATCH':
      $operation = $_GET['operation'];

      if($operation == "delete"){
        $api->deleteRequest($connection, $_GET);
          }elseif ($operation == "approve") {
            $api->approveRequests($connection, $_GET);
          }else {
            header('Content-Type: application/json');
            echo json_encode("Operation not recognized");
          }

    default:
    	header("HTTP/1.0 405 Method Not Allowed");
    	  break;

}
 ?>
