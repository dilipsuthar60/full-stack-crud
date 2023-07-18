<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data["id"];
    $name = $data["name"];
    $email = $data["email"];
    $subject = $data["subject"];
    $gender = $data["gender"];
    $message = $data["message"];
    $sql = "UPDATE studentdata SET name = '$name',email = '$email',subject='$subject',gender= '$gender',message= '$message' WHERE id = '$id'";
    $result = $connect->query($sql);
    if ($result) {
        $data = ['status' => 1, 'message' => 'data insert succesfully','data'=>$result];
        header("HTTP/1.0 200 OK");
        echo json_encode($data);
    }
}
?>