<?php
include_once 'connection.php';

class Rest{

  function insertRequest($connection, $method){
    $author = $method['author'];
    $points = $method['points'];
    $block = $method['block'];
      $query = "INSERT INTO requests (author, points, block) VALUES ('$author', $points, '$block');";
      try{
        mysqli_query($connection, $query);
      }catch(Exception $e){
        header('Content-Type: application/json');
        echo json_encode("Insertion error: " . $e->getMessage());
      }
  }
}
 ?>
