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

$userid = $_SESSION['user']["id"];

    $result = $conn->query("SELECT * FROM Announcement WHERE userid=$userid");
    // var_dump($result);
    if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
    ?>

<form action="#" method="post" enctype="multipart/form-data" style="padding: 10px;">
    <table class="table table-striped  " style="width: 600px;">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <tr>
    <td><label>Title : </label></td>  
    <td><input type="text" name="title" value="<?php echo $row['title'];?>"></td>
    </tr>
    <br><br>
    <tr>
    <td> <label>Disc : </label></td>
    <td>  <input  type="text" name="disc" value = "<?php echo $row['disc']; ?>"></td>
    </tr>
    <tr>
    <td> <label>location : </label></td>
    <td>  <input type="text" name="location" value = "<?php echo $row['location']; ?>"></td>
    </tr>
    <tr>
    <td> <label>phone : </label></td>
    <td>  <input type="phone" name="phone" value = "<?php echo $row['phone']; ?>"></td>
    </tr>
    <tr>
    <td> <label>Websit : </label></td>
    <td>  <input type="website" name="website" value = "<?php echo $row['website']; ?>"></td>
    </tr>
    <tr>
    <td> <label>email : </label></td>
    <td>  <input type="email" name="email" value = "<?php echo $row['email']; ?>"></td>
    </tr>
    <tr>
    <td> <label>Date Start the Event : </label></td>
    <td>  <input type="date" name="field1" value = "<?php echo $row['field1']; ?>"></td>
    </tr>
    <br><br>
    <tr>
    <td><label>Date End the Event    : </label></td>
    <td><input type="date" name="field2" value="<?php echo $row['field2']; ?>"></td>
    </tr>
    <br>

    <td><input type="submit" name="submit" value="Update"></td>
    <td></td>
    </table>

</form>

            <?php
        }
    }

//     //chosed data in table


// UPDATING DATA

if(isset($_POST['title']) && isset($_POST['disc']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['website']) && isset($_POST['location']) && isset($_POST['field1']) && isset($_POST['field2'])){
    // check username and email empty or not
    // if(!empty($_POST['username']) && !empty($_POST['email'])){
        // Escape special characters.
        $title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
        $disc = mysqli_real_escape_string($conn, htmlspecialchars($_POST['disc']));
        $phone = mysqli_real_escape_string($conn, htmlspecialchars($_POST['phone']));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
        $website = mysqli_real_escape_string($conn, htmlspecialchars($_POST['website']));
        $location = mysqli_real_escape_string($conn, htmlspecialchars($_POST['location']));
        $field1 = mysqli_real_escape_string($conn, htmlspecialchars($_POST['field1']));
        $field2 = mysqli_real_escape_string($conn, htmlspecialchars($_POST['field2']));
    
                // UPDATE USER DATA               
                $query = mysqli_query($conn,"UPDATE Announcement SET title='$title', disc='$disc', location='$location', phone='$phone', email='$email', website='$website', field1='$field1', field2='$field2' WHERE userid='$userid'" );

                if($query == true){
                    echo "<p style='color:green;'>The announcement is Updated by successfully</p>";
                    echo "<button href='index.php' class='btn btn-success'>BACK</button>";
                }
    }   

?>
<?php
// if(isset( $_GET['title']) && isset($_GET['disc']) && isset($_GET['location']) && isset($_GET['phone']) && isset($_GET['email']) && isset($_GET['website']) && isset($_GET['field1']) && isset($_GET['field2'])){
    
//     $titleToDb = $conn->$_GET['title'];
//     $discTodb = $conn->$_GET['disc'];
//     $locationTodb = $conn->$_GET['location'];
//     $phoneTodb = $conn->$_GET['phone'];
//     $emailToDb = $conn->$_GET['email'];
//     $websiteTodb = $conn->$_GET['website'];
//     $field1Todb = $conn->$_GET['field1'];
//     $field2Todb = $conn->$_GET['field2'];
//    var_dump($titleToDb);

//     //update data to database	
//     $result = $conn->query("UPDATE Announcement SET title=$titleToDb, disc=$discTodb, location=$locationTodb, phone=$phoneTodb, email=$emailTodb, website=$websiteTodb, field1=$field1Todb, field2=$field2Todb  WHERE userid= $id");
//     var_dump($result);
//     $result->bindParam("$id",$_GET['userid']);
//     $result->execute();


// 	//display success message
//     echo "<font color='green'>Updated";
//     echo "<br/><a href='index.php'>Retour au tableau</a>";


// }


require_once '../inc/footer.php';
?>