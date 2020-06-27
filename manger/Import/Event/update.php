<?php 
// include_once __DIR__."/../../Core/config2.php";

include_once '../inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "../inc/header.php";
include_once "../inc/navbar.php";
?>
<?php
// Load the database configuration file
include_once '../../../Core/config2.php';

    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM Announcement WHERE id=$id");

    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
    ?>

<form action="update.php" method="post" enctype="multipart/form-data" style="margin: 30px;">
    <table >
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <tr>
    <td><label>Title : </label></td>  
    <td><input type="text" name="title" value="<?php echo $row['title'];?>"></td><!--تم وضع القيم في التي نريد تعديلها حسب الاي دي -->
    </tr>
    <br><br>
    <tr>
    <td> <label>Disc : </label></td>
    <td>  <input type="text" name="disc" value = "<?php echo $row['disc']; ?>"></td>
    </tr>
    <tr>
    <td> <label>location : </label></td>
    <td>  <input type="text" name="location" value = "<?php echo $row['location']; ?>"></td>
    </tr>
    <tr>
    <td> <label>phone : </label></td>
    <td>  <input type="text" name="phone" value = "<?php echo $row['phone']; ?>"></td>
    </tr>
    <tr>
    <td> <label>email : </label></td>
    <td>  <input type="text" name="email" value = "<?php echo $row['email']; ?>"></td>
    </tr>
    <tr>
    <td> <label>Date Start the Event : </label></td>
    <td>  <input type="text" name="field1" value = "<?php echo $row['field1']; ?>"></td>
    </tr>
    <br><br>
    <tr>
    <td><label>Date End the Event      : </label></td>
    <td><input type="text" name="field2" value="<?php echo $row['field2']; ?>"></td>
    </tr>
    <br>
    <tr>
    <td><input type="submit" name="submit" value="Update"></td>
    </tr>
    </table>

</form>

            <?php
        }
    }

    //chosed data in table
if(isset($_GET['title']) && isset($_GET['disc']) && isset($_GET['location']) && isset($_GET['phone']) && isset($_GET['email']) && isset($_GET['website']) && isset($_GET['field1']) && isset($_GET['field2'])){
    
    $titleToDb = $conn->$_GET['title'];
    $discTodb = $conn->$_GET['disc'];
    $locationTodb = $conn->$_GET['location'];
    $phoneTodb = $conn->$_GET['phone'];
    $emailToDb = $conn->$_GET['email'];
    $websiteTodb = $conn->$_GET['website'];
    $field1Todb = $conn->$_GET['field1'];
    $field2Todb = $conn->$_GET['field2'];
   

    //update data to database	
    $result = $conn->query("UPDATE Announcement SET title=$titleToDb, disc=$discTodb, location=$locationTodb, phone=$phoneTodb, email=$emailTodb, website=$websiteTodb, field1=$field1Todb, field2=$field2Todb  WHERE id= :id");
    // $result->bindParam(":id",$_GET['id']);

	//display success message
    echo "<font color='green'>Updated";
    echo "<br/><a href='index.php'>Retour au tableau</a>";


}

?>