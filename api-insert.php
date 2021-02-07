<?php

header("Content-Type: application/json");
header("Access-control-allow-origin:*");
header("Access-control-allow-methods:POST");
header("Access-control-allow-Headers:Content-Type,Access-control-allow-Headers,Access-control-allow-methods,Authorization,X-requested-With");


$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$age = $data['sage'];
$Male = $data['sGender'];
$Country = $data['sCountry'];


require "config.php";
$sql = "INSERT INTO `form` (`name`,`age`,`gander`,`country`) VALUES ('$name',$age,'$Male','$Country')";
$result = mysqli_query($connection, $sql) or die("Failed");
if ($result) {
    echo json_encode(["message" => "Student Record Inserted", "status" => true]);
} else {
    echo json_encode(["message" => "Student Record Not Inserted", "status" => false]);
}
