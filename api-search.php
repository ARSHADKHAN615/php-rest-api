<?php

header("Content-Type: application/json");
header("Access-control-allow-origin:*");
header("Access-control-allow-methods:DELETE");


// $data = json_decode(file_get_contents("php://input"), true);
// $search_value = $data['search'];

$search_value = isset($_GET['search']) ? $_GET['search'] : die();

require "config.php";
$sql = "SELECT * FROM form WHERE name LIKE '%$search_value%'";
$result = mysqli_query($connection, $sql) or die("Failed");


if (mysqli_num_rows($result)) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No Record Found", "status" => false]);
}
