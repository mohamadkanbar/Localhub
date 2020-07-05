<?php 
include_once '../Core/config2.php';
session_start();
$userid= $_SESSION['user']['id'];
var_dump($userid);

extract($_POST);
$Announcement_id=$conn->real_escape_string($id);
$status=$conn->real_escape_string($status);

var_dump($Announcement_id);
$result = $conn->query("UPDATE Announcement SET recommend='$status' WHERE id='$id'");

if($status == 0){

    $sql=mysqli_query($conn, "INSERT INTO favorite_profile (userId, AnnouncementId) VALUES ( '$userid', '$id')");
    
}else{
    $sql=mysqli_query($conn, "DELETE FROM favorite_profile WHERE AnnouncementId=$id;");
}
?>