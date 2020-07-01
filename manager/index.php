
<?php 
include_once 'inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
include_once __DIR__."/../Core/config2.php";
?>
<!--  -->
</a>
<div class="container" style="padding-top: 20px;">
  <div class="row" >
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;" href="Import/Event/index.php">Manage and import list of Event </a>
    </div>
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;"  href="Import/Stage/index.php">Manage and import list of Stage </a>
    </div>
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;"  href="Import/Job/index.php">Manage and import list of Job </a>
    </div>
  </div>
</div>

<div class="container" style="padding-top: 20px;">
  <div class="row">
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;"  href="Import/Shop/index.php">Manage and import list of Shop </a>
    </div>
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;"  href="Import/Twonhall/index.php">Manage and import list of Twonhall </a>
    </div>
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;"  href="Import/Library/index.php">Manage and import list of Library </a>
    </div>
  </div>
</div>

<div class="container" style="padding-top: 20px;">
  <div class="row">
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;"  href="Import/Companies/index.php">Manage and import list of Companies </a>
    </div>
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;"  href="Import/Associations/index.php">Manage and import list of Associations </a>
    </div>
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;"  href="Import/Schools/index.php">Manage and import list of Schools </a>
    </div>
  </div>
</div>

<div class="container" style="padding-top: 20px;">
  <div class="row">
    <div class="col-sm" style=" padding:10px;">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;"  href="Import/TourstOffice/index.php">Manage and import list of Tourst_Office </a>
    </div>
    <!-- <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;" ></a>
    </div>
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px; height:50px; width: 300px;" ></a>
    </div> -->
  </div>
</div>

<?php

?>

<?php
require_once 'inc/footer.php';

?>