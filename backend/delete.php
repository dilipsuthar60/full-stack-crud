<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
include 'config.php';
try {
    $id = $_GET["id"];
    $sql = "delete from studentdata where id=$id";
    $result = $connect->query($sql);
    $data = ['status' => 1, 'message' => 'data delete succesfully',];
    header("HTTP/1.0 200 OK");
    echo json_encode($data);
} catch (\Throwable $th) {
    echo $th;
}
?>