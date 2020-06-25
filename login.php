<?php 
include "inc/topHeader.php";
include_once "Classes/login.class.php";
?>
<title>Log in <?php echo SITENAME;?></title>
<?php
// include("importCSV.php");

include "inc/header.php";
include "inc/navbar.php";

?>
<main>
    <div>
        <article class="col-xs-12 col-md-12">
            <div class="col-md-6 col-md-offset-3" style="padding: 0px; margin:10px;">
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['login'])){
                        $login= new Login();
                        $login->setInput($_POST['email'],$_POST['password']); 
                        $login->DisplayError();
                    }
                ?>      
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div style="background-color: #eeeeee; margin-bottom: 20px; margin: 10px; padding: 5px;" class="page-header">
                    <div class="page-header">
                        <h1 style="font-size: 2rem;">Login <small style="color: #0323;"></small></h1>
                    </div>
                <?php
                if(isset($_SESSION['is_logged']) and $_SESSION['is_logged']==TRUE){
                    Messages::setMsg('Alert ! ',' Sorry '.$_SESSION['user']['fname'].''.$_SESSION['user']['lname'].' Your are Registerd','wqrning');
                    echo Messages::getMsg();
                }else{
                    require_once 'inc/forms/login.php';
                }
            ?>
                </div>
            </div>
        </article>
    </div>
</main>

<?php
include 'inc/footer.php';
?>