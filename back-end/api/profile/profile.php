<?php 
require_once("../../db/connection/connect.php");

$username = $_REQUEST["username"];
$db = new DB();
$connection = $db->getConnection();

if ($username !== "") {    
  $selectQ = "SELECT username,password,full_name,fn,email,graduation,major,groupN FROM users WHERE username = :username";
  $stmt = $connection->prepare($selectQ);
  $stmt->execute(["username" => $username]);
  $user_data = $stmt->fetch(PDO::FETCH_ASSOC);  
  
  $password = $user_data["password"];
  $full_name = $user_data["full_name"];
  $fn = $user_data["fn"];
  $email = $user_data["email"];
  $graduation = $user_data["graduation"];
  $major = $user_data["major"];
  $groupN = $user_data["groupN"];
}

$result = array("$password", "$full_name", "$fn", "$email", "$graduation", "$major", "$groupN");
$myJSON = json_encode($result);
echo $myJSON;
?>
