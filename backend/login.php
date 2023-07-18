<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
$requestMethod = $_SERVER["REQUEST_METHOD"];
session_start();

if ($requestMethod == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = trim($data['email']);
    $password = $data['password'];
    $sql = "SELECT * FROM `account` WHERE `email` = '" . $email . "' AND  `password` = '" . $password . "'";
    $result = $connect->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["password"] = $row["password"];
        $_SESSION["email"] = $row["email"];
        $data = ['status' => 1, 'result' => 'valid user'];
        echo json_encode($data);
    } else {
        $data = ['status' => 0, 'result' => 'Invalid'];
        echo json_encode($data);
    }
}

?>