<?php

header("Content-Type: application/json");
header("Access-control-allow-origin:*");
header("Access-control-allow-methods:PUT");
header("Access-control-allow-Headers:Content-Type,Access-control-allow-Headers,Access-control-allow-methods,Authorization,X-requested-With");


$data = json_decode(file_get_contents("php://input"), true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$Male = $data['sGender'];
$Country = $data['sCountry'];


require "config.php";
$sql = "UPDATE `form` SET `name`= '$name',`age`='$age',`gander`='$Male',`country`='$Country' WHERE id=$id";
$result = mysqli_query($connection, $sql) or die("Failed");
if ($result) {
    echo json_encode(["message" => "Student Record Update", "status" => true]);
} else {
    echo json_encode(["message" => "Student Record Not Update", "status" => false]);
}
