<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == "GET") {
   $sql = "SELECT * FROM studentdata";
   $result = $connect->query($sql);
   $total_row = mysqli_num_rows($result);
   if ($total_row > 0) {
      $data_array = [];
      while ($row = mysqli_fetch_assoc($result)) {
         array_push($data_array, $row);
      }
      $data = [
         'status' => 1,
         'message' => $requestMethod . 'Succesfully',
         'data' => $data_array,
      ];
      header("HTTP/1.0 200 Succeses");
      echo json_encode($data);
   } else {
      header("HTTP/1.0 404 Not Found");
      echo json_encode($data);
   }
} else {
   $data = [
      'status' => 405,
      'message' => $requestMethod . 'method no found',
   ];
   header("HTTP/1.0 405 Method Not Allowed");
   echo json_encode($data);
}
?>