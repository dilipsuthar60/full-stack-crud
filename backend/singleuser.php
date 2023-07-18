<?php
include 'config.php';
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod == "GET") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM studentdata where id=$id";
    $result = $connect->query($sql);
    $total_row = mysqli_num_rows($result);
    if ($total_row > 0) {
        $row = mysqli_fetch_assoc($result);
        $data = [
            'status' => 1,
            'message' => $requestMethod . ' Succesfully',
            'data' => $row,
        ];
        header("HTTP/1.0 200 Succeses");
        echo json_encode($data);
    } else {
        $data = [
            'status' => 0,
            'message' => $requestMethod . ' method no found',
        ];
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode($data);
    }
} else {
    $data = [
        'status' => 0,
        'message' => $requestMethod . ' method no found',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}
?>