<?php

session_start();
$_SESSION = [];

if (isset($_COOKIE["user"])) {
    unset($_COOKIE["user"]);
    setcookie("user", "", time() - 3600, "/");
}

if (isset($_COOKIE["password"])) {
    unset($_COOKIE["password"]);
    setcookie("password", "", time() - 3600, "/");
}

if (session_destroy()) {
    http_response_code(200);
    exit(json_encode(["status" => "success", "message" => "Успешно излязохте от системата!"], JSON_UNESCAPED_UNICODE));
} else {
    http_response_code(500);
    exit(json_encode(["status" => "error", "message" => "Възникна грешка при опита за излизане от системата!"], JSON_UNESCAPED_UNICODE));
}

?>