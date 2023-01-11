<?php

require_once('../../db/connection/connect.php');

function createUserSession($user)
{
    try {
        $db = new DB();
        $connection = $db->getConnection();
        $selectQuery = "SELECT password,full_name,email FROM users WHERE username = :username";
        $statement = $connection->prepare($selectQuery);
        $statement->execute(["username" => $user["username"]]);

        if ($statement->rowCount() == 0) {
            return ["status" => "error", "message" => "Не е открит потребител с това потребителско име!", "code" => 400];
        }

        $user_from_db = $statement->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($user["password"], $user_from_db["password"])) {
            return ["status" => "error", "message" => "Грешна парола!", "code" => 400];
        }
    } catch (PDOException $e) {
        return ["status" => "error", "message" => "Възникна грешка при опита за връзка с базата данни!", "code" => 500];
    }
    session_start();
    $_SESSION["user"] = $user_from_db;

    setcookie("user", $user["username"], time() + 60 * 60 * 2, "/");
    setcookie("password", $user["password"], time() + 60 * 60 * 2, "/");

    return ["status" => "success", "message" => "Успешен вход в системата!", "code" => 200];
}
