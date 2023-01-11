<?php

require_once('../libs/create_user_session.php');

$phpInput = json_decode(file_get_contents('php://input'), true);

if (empty($phpInput['username']) || empty($phpInput['password'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Моля, попълнете потребителско име и парола.",
    ], JSON_UNESCAPED_UNICODE);
} else {
    $username = $phpInput['username'];
    $password = $phpInput['password'];
    $userObject = ["username" => $username, "password" => $password];
    $response = createUserSession($userObject);
    http_response_code($response["code"]);
    echo json_encode(["status" => $response["status"], "message" => $response["message"]], JSON_UNESCAPED_UNICODE);
}
