
<?php 
// include_once __DIR__."/../../Core/config2.php";
// session_start();



include_once '../inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "../inc/header.php";
include_once "../inc/navbar.php";
// include_once "../../../Classes/MysqliConnect.class.php";
?>
<?php
// Load the database configuration file
include_once '../../../Core/config2.php';
$id = $_SESSION['user']["id"];
// var_dump($conn);
if(isset($_POST['submitForm'])) {
    $titleToDB =    mysqli_real_escape_string($conn,$_POST['ftitle']);
    $discTodb =     mysqli_real_escape_string($conn,$_POST['fdisc']);
    $locationTodb = mysqli_real_escape_string($conn,$_POST['flocation']);
    $phoneToDB =    mysqli_real_escape_string($conn,$_POST['fphone']);
    $websiteTodb =  mysqli_real_escape_string($conn,$_POST['fwebsite']);
    $emailTodb =    mysqli_real_escape_string($conn,$_POST['femail']);
    $startTodb =    mysqli_real_escape_string($conn,$_POST['fstart']);
    $endTodb =      mysqli_real_escape_string($conn,$_POST['fend']);

    if(empty($titleToDB) || empty($discTodb) || empty($locationTodb) || empty($startTodb) || empty($endTodb)){

		if(empty($titleToDB)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}

		if(empty($discTodb)) {
			echo "<font color='red'>Discraption field is empty.</font><br/>";
		}

		if(empty($locationTodb)) {
			echo "<font color='red'>Adress field is empty.</font><br/>";
        }
        if(empty($startTodb)) {
			echo "<font color='red'>Start date field is empty.</font><br/>";
        }
        if(empty($endTodb)) {
			echo "<font color='red'>End date field is empty.</font><br/>";
		}
		//link to the previous page
	} else {
    $conn->query("INSERT INTO Announcement (title, disc,location, phone, website, email, field1, field2, created,categoryid, userid ) VALUES ('$titleToDB', '$discTodb', '".$locationTodb."', '".$phoneToDB."', '".$websiteTodb."', '".$emailTodb."', '".$startTodb."', '".$endTodb."', NOW(),9,$id)");
    echo "<font color='green'>Data well added to the database";
}
}
?>
<form action="#" method="post" name="form" style="margin: 30px; padding-right: 500px;">
  <div class="form-group" >
    <label for="exampleInput">Title <span class="required" style="color: red;">*</span></label>
    <input type="text" name="ftitle" class="form-control" id="exampleInput" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description <span class="required" style="color: red;">*</span></label>
    <input type="text" name="fdisc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Addres <span class="required" style="color: red;">*</span></label>
    <input type="text" name="flocation" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone number</label>
    <input type="tel" name="fphone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Website</label>
    <input type="url" name="fwebsite" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" name="femail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>  <div class="form-group">
    <label for="exampleInputEmail1">Start date <span class="required" style="color: red;">*</span></label>
    <input type="date" name="fstart" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  </div>  <div class="form-group">
    <label for="exampleInputEmail1">End date <span class="required" style="color: red;">*</span></label>
    <input type="date" name="fend" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="submitForm" class="btn btn-primary">Add new Anounnecment</button>
</form>
<?php
require_once '../inc/footer.php';
?>