
<?php 

include_once 'inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
include_once __DIR__."/../Core/config2.php";

?>

<table class="table table-striped table-bordered " style="margin-right: 100px; padding: 50px;">
<thead class="thead-dark ">
  <tr>
  <th>#</th>
  <th>First name</th>
  <th>Last name</th>

  <th>email</th>
  <th>Action</th>
  </tr>
</thead>
  <?php $sql=$conn->query("Select * from users");
        foreach ($sql as $key => $users) {
  ?>
  <tr>
  <td><?php echo $users['id'] ?></td>
  <td><?php echo $users['firstname']; ?></td>
  <td><?php echo $users['lastname']; ?></td>

  <td><?php echo $users['email']; ?></td>
  <td>
    <i data="<?php echo $users['id'];?>" class="status_checks btn
  <?php echo ($users['isActive'])?
  'btn-success': 'btn-danger'?>"><?php echo ($users['isActive'])? 'Active' : 'Inactive'?>
 </i>
</td>
  </tr>
  <?php } ?>
  </table>


  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "ajax.php";
        $.ajax({
          type:"POST",
          url: url,
          data: {id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });
</script>


<?php
require_once 'inc/footer.php';

?>