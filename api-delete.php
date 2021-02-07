<?php

header("Content-Type: application/json");
header("Access-control-allow-origin:*");
header("Access-control-allow-methods:DELETE");


// $data = json_decode(file_get_contents("php://input"), true);
// $student_id = $data['sid'];
$student_id = $_GET['sid'];
require "config.php";
$sql = "DELETE  FROM form WHERE id=$student_id";
$result = mysqli_query($connection, $sql) or die("Failed");


if ($result) {
    echo json_encode(["message" => "Student Record Delete", "status" => true]);
} else {
    echo json_encode(["message" => "Student Record Not Delete", "status" => false]);
}
