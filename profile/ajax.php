<?php 

include_once '../Core/config2.php';
// session_start();
// $id = $_SESSION["user"]["id"];
// $status = mysqli_query($conn, "SELECT * from  Announcement Where iduser= $id");
var_dump($conn);
extract($_POST);
$Announcement_id=$conn->real_escape_string($id);
$status=$conn->real_escape_string($status);
$result = $conn->query("UPDATE Announcement SET recommend='$status' WHERE id='$id'");
echo 1;
?>