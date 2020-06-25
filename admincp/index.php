
<?php 
include_once __DIR__."/../Core/config2.php";

include_once 'inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
?>
<!-- بداية تجريب الحلقة-->
<!--  -->
</a>

<div class="container" style="padding-top: 20px;">
  <div class="row">
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/Event/index.php">Mange and import list of Event </a>
    </div>
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/Stage/index.php">Mange and import list of Stage </a>
    </div>
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/Job/index.php">Mange and import list of Job </a>
    </div>
  </div>
</div>

<div class="container" style="padding-top: 20px;">
  <div class="row">
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/Shop/index.php">Mange and import list of Shop </a>
    </div>
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/Twonhall/index.php">Mange and import list of Twonhall </a>
    </div>
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/Library/index.php">Mange and import list of Library </a>
    </div>
  </div>
</div>

<div class="container" style="padding-top: 20px;">
  <div class="row">
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/Companies/index.php">Mange and import list of Companies </a>
    </div>
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/Associations/index.php">Mange and import list of Associations </a>
    </div>
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/Schools/index.php">Mange and import list of Schools </a>
    </div>
  </div>
</div>

<div class="container" style="padding-top: 20px;">
  <div class="row">
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;" href="Import/TourstOffice/index.php">Mange and import list of Tourst_Office </a>
    </div>
    <!-- <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;"></a>
    </div>
    <div class="col-sm">
    <a type="button" class="btn btn-success" style="padding: 10px;"></a>
    </div> -->
  </div>
</div>

<?php

 
//  require 'inc/forms/Event.php' ;

?>

<?php
require_once 'inc/footer.php';

?>