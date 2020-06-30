<?php

include_once "../Core/config2.php";
session_start();
// $AnnouncementId =$_GET['Announcement']['id'];

$userid = $_SESSION['user']['id'];

if(isset($_POST['submitForm'])) {
    $AnnounidToDB =    mysqli_real_escape_string($conn,$_POST['AnnouncementId']);
    $useridTodb =     mysqli_real_escape_string($conn,$_POST['userId']);
    // $locationTodb = mysqli_real_escape_string($conn,$_POST['flocation']);

    $conn->query("INSERT into favorite_profile (AnnouncementId, userId) VALUES ($AnnounidToDB,$useridTodb)");

}


?>