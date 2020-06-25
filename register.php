<?php 
include "inc/topHeader.php"; 
session_destroy();
?>
<title>Register <?php echo SITENAME;?></title>
<?php
include "inc/header.php";
include "inc/navbar.php";
?>
<main class="col-md-8 container" style="background-color:lightgray; padding: 10px; margin:10px;">
    <div>
        <article class="col-xs-12 col-md-12">
            <div class="col-md-6 col-md-offset-3" style="padding: 0px;">
            <?php
              if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['register'])){
                  $register = new Register();
                  
                  $register->setInput($_POST['firstname'],$_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['confirm'],$_POST['customRadio']);
                  $register->DisplayError();
              }
              ?>
            </div>
                <div class="col-md-6 col-md-offset-3">
                <div style=" margin-bottom: 20px; margin: 10px; padding: 5px;" class="page-header">
                <div class="page-header">
                    <h1 style="font-size: 2rem;">Register <small style="color: #0323;">Please fill all fields</small></h1>
                </div>
            </div>
        </article>
    </div>
    <div>
            <?php
                if(isset($_SESSION['is_logged']) and $_SESSION['is_logged']==TRUE){
                    Messages::setMsg('Alert ! ',' Sorry '.$_SESSION['user']['fname'].''.$_SESSION['user']['lname'].' Your are Registerd','wqrning');
                    echo Messages::getMsg();
                }else{
                    require_once 'inc/forms/register.php';
                }
            ?>
    </div>
</main>
<?php
include 'inc/footer.php';
?>