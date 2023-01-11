<?php
require_once("../../db/connection/connect.php");

$phpInput = json_decode(file_get_contents('php://input'), true);
header('Content-Type: application/json');

$username = $phpInput['username'];
$password = $phpInput['password'];
$graduation = $phpInput['graduation'];
$major = $phpInput['major'];
$groupN = $phpInput['groupN'];


try {
    $db = new DB();
    $connection = $db->getConnection();
    $sql = "UPDATE users SET password = :password, graduation = :graduation, major = :major, groupN = :groupN WHERE username = " . $username;
    $updateUser = $connection()->prepare($sql);
    $updateUser->execute(["password" => $password, "graduation" => $graduation, "major" => $major, "groupN" => $groupN]);
    echo json_encode(["status" => "success", "message" => "Профилът ви беше променен успешно!"], JSON_UNESCAPED_UNICODE);
    // echo json_encode(["status" => "success", "message" => $sql], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    return json_encode(["status" => "error", "message" => "Възникна грешка при промяната на профила!"], JSON_UNESCAPED_UNICODE);
}
