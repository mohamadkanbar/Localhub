<?php 

include_once __DIR__."/../Core/config2.php";



extract($_POST);
$user_id=$conn->real_escape_string($id);
$status=$conn->real_escape_string($status);
$sql=$conn->query("UPDATE users SET isActive='$status' WHERE id='$id'");
echo 1;
?>

