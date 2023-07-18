<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-With");

session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
session_destroy();

echo json_encode([
    'result' => 'loggedOut',
    'email' => $_SESSION['email'],
]);
?>