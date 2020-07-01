<?php 

include_once '../../../Core/config2.php';


extract($_POST);
$Announcement_id=$conn->real_escape_string($id);
$status=$conn->real_escape_string($status);
$result = $conn->query("UPDATE Announcement SET isActive='$status' WHERE id='$id'");
echo 1;
?>