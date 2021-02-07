<?php

header("Content-Type: application/json");
header("Access-control-allow-origin:*");

// $data = json_decode(file_get_contents("php://input"), true);
// $student_id = $data['sid'];
$student_id = $_GET['sid'];

require "config.php";
$sql = "SELECT * FROM form WHERE id=$student_id";
$result = mysqli_query($connection, $sql) or die("Failed");
if (mysqli_num_rows($result)) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No Record Found", "status" => false]);
}
