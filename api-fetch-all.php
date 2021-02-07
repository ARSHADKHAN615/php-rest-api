<?php
header("Content-Type: application/json");
header("Access-control-allow-origin:*");


require "config.php";
$sql = "SELECT * FROM form";
$result = mysqli_query($connection, $sql) or die("Failed");
if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No Record Found", "status" => false]);
}
