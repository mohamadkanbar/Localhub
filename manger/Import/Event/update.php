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

// mettre le data dans à elemetes
$id=$_GET['id'];
    if(isset($_GET['id'])){
            $results = $conn->query("SELECT * FROM Announcement WHERE id = $id");
        
            while($res = mysqli_fetch_array($results)){







         

            ?>
<form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $results['id'];?>">
    <tr>
    <td><label>Title : </label></td>  
    <td><input type="text" name="title" value="<?php echo $results['title'];?>"></td><!--تم وضع القيم في التي نريد تعديلها حسب الاي دي -->
    </tr>
    <br><br>
    <tr>
    <td> <label>Disc : </label></td>
    <td>  <input type="text" name="disc" value = "<?php echo $results['disc']; ?>"></td>
    </tr>
    <tr>
    <td> <label>location : </label></td>
    <td>  <input type="text" name="location" value = "<?php echo $results['location']; ?>"></td>
    </tr>
    <tr>
    <td> <label>phone : </label></td>
    <td>  <input type="text" name="phone" value = "<?php echo $results['phone']; ?>"></td>
    </tr>
    <tr>
    <td> <label>email : </label></td>
    <td>  <input type="text" name="email" value = "<?php echo $results['email']; ?>"></td>
    </tr>
    <tr>
    <td> <label>Active : </label></td>
    <td>  <input type="text" name="active" value = "<?php echo $results['isActive']; ?>"></td>
    </tr>
    <tr>
    <td> <label>Date Start the Event : </label></td>
    <td>  <input type="text" name="field1" value = "<?php echo $results['field1']; ?>"></td>
    </tr>
    <br><br>
    <tr>
    <td><label>Date End the Event      : </label></td>
    <td><input type="text" name="field2" value="<?php echo $results['field2']; ?>"></td>
    </tr>
    <br>
    <tr>
    <td><input type="submit" name="submit" value="Update"></td>
    </tr>
</form>
            <?php
        }
    }
    // <th>#ID</th>
// <th>title</th>
// <th>disc</th>
// <th>location</th>
// <th>phone</th>
// <th>email</th>
// <th>website</th>
// isActive
// <th>Date Start the Event</th>
// <th>Date End the Event</th>

    //chosed data in table
if(isset($_GET['id']) && isset($_GET['title']) && isset($_GET['disc']) && isset($_GET['location']) && isset($_GET['phone']) && isset($_GET['email']) && isset($_GET['active']) && isset($_GET['website']) && isset($_GET['field1']) && isset($_GET['field2'])){
    
    $idTodb = $$conn->quote($_GET['id']);
    $titleToDb = $conn->$_GET['title'];
    $discTodb = $conn->$_GET['disc'];
    $locationTodb = $conn->$_GET['location'];
    $phoneTodb = $conn->$_GET['phone'];
    $emailToDb = $conn->$_GET['email'];
    $activelToDb = $conn->$_GET['isActive'];

    $websiteTodb = $conn->$_GET['website'];
    $field1Todb = $conn->$_GET['field1'];
    $field2Todb = $conn->$_GET['field2'];
   

    //update data to database	
    $result = $conn->query("UPDATE Announcement SET title=$titleToDb, disc=$discTodb, location=$locationTodb, phone=$phoneTodb, isActive=$activelToDb, email=$emailTodb, website=$websiteTodb, field1=$field1Todb, field2=$field2Todb  WHERE id= :id");
    // $result->bindParam(":id",$_GET['id']);

	//display success message
    echo "<font color='green'>Updated";
    echo "<br/><a href='index.php'>Retour au tableau</a>";


}

?>