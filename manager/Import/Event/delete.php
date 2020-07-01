<?php 



include_once '../../../Core/config2.php';
session_start();

$id = $_GET['id'];
if(isset($_GET['id'])){
// sql to delete a record
$sql = "DELETE FROM Announcement WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  header("location: index.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
}
?>
