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
        // echo $data;
        $name = trim($data['name']);
        $email = trim($data['email']);
        $password = $data['password'];
         echo $email;
        if (!empty($email)) {
            $sql = "SELECT * FROM `account` WHERE `email` = '" . $email . "'";
            $result = $connect->query($sql);
            $present_row_count_in_db = mysqli_num_rows($result);
            if ($present_row_count_in_db > 0) {
                $data = ['status' => 0, 'result' => 'User Already Exist'];
            
                echo json_encode($data);
            }
            else if (!empty($name) && !empty($email) && !empty($password)) {
                $sql = "INSERT INTO account VALUES ('$name', '$email', '$password')";
                $result = $connect->query($sql);
                $data = ['status' => 1, 'result' => 'data insert sucessfully'];
               
                echo json_encode($data);
            }
        } else {
            $data = ['status' => 0, 'result' => 'User Already Exist'];
            echo json_encode($data);
        }
    }

} catch (\Throwable $th) {
    echo $th;
}

?>