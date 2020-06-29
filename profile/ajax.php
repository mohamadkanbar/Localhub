<?php 

include_once '../Core/config2.php';
// session_start();
// $id = $_SESSION["user"]["id"];
// $status = mysqli_query($conn, "SELECT * from  Announcement Where iduser= $id");
var_dump($conn);
extract($_POST);
$Announcement_id=$conn->real_escape_string($id);
$status=$conn->real_escape_string($status);
$result = $conn->query("INSERT INTO liketable (iduser, idannouncement) VALUES ($status, $Announcement_id)
                                    SELECT $status, $Announcement_id
                                    WHERE NOT EXISTS (SELECT 1 FROM liketable WHERE iduser = 1) ;");
echo 1;



// INSERT INTO liketable (iduser, idannouncement)
// SELECT 1, 43
// WHERE NOT EXISTS (SELECT 1 FROM liketable WHERE iduser = 1);



// INSERT INTO liketable (iduser, idannouncement)
// SELECT 8, 43
// WHERE NOT EXISTS (SELECT 1 FROM liketable WHERE iduser != 1);


?>