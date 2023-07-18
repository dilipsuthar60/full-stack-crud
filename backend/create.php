<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
$requestMethod = $_SERVER["REQUEST_METHOD"];
try {
   if ($requestMethod == "POST") {
      $data = json_decode(file_get_contents("php://input"), true);
      $name = trim($data['name']);
      $email = trim($data['email']);
      $subject = $data['subject'];
      $gender = $data['gender'];
      $message = trim($data['message']);
      if (!empty($name) && !empty($email) && !empty($subject) && !empty($gender) && !empty($message)) {
         $sql = "INSERT INTO studentdata VALUES (NULL,'$name', '$email', '$subject', '$gender', '$message')";
         $result = $connect->query($sql);
      }
      if ($result) {
         $data = ['status' => 1, 'message' => 'data insert succesfully',];
         header("HTTP/1.0 200 OK");
         echo json_encode($data);
      } else {
         $data = ['status' => 0, 'message' => 'data wrong',];
         header("HTTP/1.0 405 Method Not Allowed");
         echo json_encode($data);
      }
   }

} catch (\Throwable $th) {
   echo $th;
}

?>