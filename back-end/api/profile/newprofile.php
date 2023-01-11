<?php 

require_once("../../db/connection/connect.php");
require_once("../libs/create_user_session.php");


session_start();
$user_id = $_SESSION["user"]["id"];

try {
    $db = new DB();
    $connection = $db->getConnection();

    $sql = "SELECT username,password,fn,email,graduation,major,groupN 
            FROM users 
            WHERE id = :id";

    $stmt = $connection->prepare($sql);
    $stmt->execute(["id" => $user_id]);

    $user_data = $stmt->fetch(PDO::FETCH_ASSOC); // only one row will be returned from the database since we filter our search by id which is unique
    
    http_response_code(200);
    exit(json_encode(["status" => "SUCCESS", "data" => $user_data]));
}
catch (PDOException $e) {
    http_response_code(500);
    exit(json_encode(["status" => "ERROR", "message" => "Неочаквана грешка настъпи в сървъра!"]));
}

?>