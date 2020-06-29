<?php

include_once "../Core/config2.php";
session_start();
// $AnnouncementId =$_GET['Announcement']['id'];
$userid = $_SESSION['user']['id'];

if(isset($_POST['submit'])){
    echo("You clicked button one!");
    $conn->query("INSERT into favorite_profile (AnnouncementId, userId) VALUES ($AnnouncementId,$userid)");
}
else {
echo" dhur";
}

?>