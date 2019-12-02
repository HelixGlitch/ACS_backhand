<?php
include_once 'connection.php';

class Rest{

  function insertRequest($connection, $method){
    $author = mysqli_real_escape_string($connection, $method['author']);
    $points = mysqli_real_escape_string($connection, $method['points']);
    $block = mysqli_real_escape_string($connection, $method['block']);
      $query = "INSERT INTO requests (author, points, block) VALUES ('$author', $points, '$block');";
      try{
        mysqli_query($connection, $query);
      }catch(Exception $e){
        header('Content-Type: application/json');
        echo json_encode("Insertion error: " . $e->getMessage());
      }
      // funciqta raboti
  }
  function getScoreboard($connection, $method){
    $tableName = mysqli_real_escape_string($connection, $method['tableName']);
    $query = "SELECT * FROM ". $tableName;
    try{
    $tableResult = mysqli_query($connection, $query);
        }catch(Exception $e){
            echo json_encode($e->getMessage());
          }
    $empData = array();
      while( $empRecord = mysqli_fetch_assoc($tableResult) ) {
          $empData[] = $empRecord;
          }
      header('Content-Type: application/json');
      echo json_encode($empData);
      //funciqta raboti
      // vrushta array s indexi i elementite mu sa associativni array
    }

function approveRequests($connection, $method){
      $whatever;
      $request = mqsqli_real_escape_string($connection,$method['$whatever']);
      $query = "SELECT * FROM requests WHERE $whatever == $request "
      $requestResult = mysqli_query($connection, $query);
      $requestRecord = mysqli_fetch_assoc($requestResult);
      $query = "SELECT * FROM scoreboard WHERE block = $requestRecord['block']";
      $scoreboardResult = mysqli_query($connection, $query);
      $scoreboardRecord =  mysqli_fetch_assoc($scoreboardResult);
      $query = "UPDATE scoreboard SET points = $scoreboardRecord['points'] + $requestRecord['points'] WHERE block = $requestRecord['block']";
      try{
        mysqli_query($connection, $query);
      }catch(Exception $e){
        header('Content-Type: application/json');
        echo json_encode("Insertion error: " . $e->getMessage());
      }
}

function deleteRequests($connection, $method){
  $whatever; // field na sql tablicata po koito shte se passva s koi request rabotim
  $request = mqsqli_real_escape_string($connection,$method['$whatever']);// vzimam konkretnata stoinost s koito shte rabotim
  $query = "DELETE FROM requests WHERE $whatever = $request";
  try{
    mysqli_query($connection, $method);
    }catch(Exception $e){
      header('Content-Type: application/json');
      echo json_encode("Insertion error: " . $e->getMessage());
    }

  }

}


 ?>
