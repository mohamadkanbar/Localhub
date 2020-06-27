<?php

include_once "../Core/config2.php";

if(isset($_POST['submit'])){
    echo("You clicked button one!");
    $conn->query("INSERT into favorite_profile (AnnouncementId, userId) VALUES (35,8)");
}
else {
echo" dhur";
}

?>