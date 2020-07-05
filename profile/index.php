<?php 
include_once 'inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
include_once "../Core/config2.php";

$userid = $_SESSION['user']["id"];

?>
<div class="row">
    <!-- Import & Export link -->

    <!-- CSV file upload form -->
    <div class="col-md-10" id="importFrm" style="display: none; margin:10px;">
        <form action="importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        </form>
    </div>
    <!-- Data list table --> 
    <table class="table table-striped table-bordered " style="margin: 30px;">
        <thead class="thead-dark ">
            <tr>
                <th>#ID</th>
                <th>title</th>
                <th>disc</th>
                <th>location</th>
                <th>phone</th>
                <th>email</th>
                <th>website</th>
                <th>Start Date </th>
				<th>End Date </th>
                <!-- <th>Gatogery</th> A INNER JOIN category G WHERE G.id = A.categoryid -->
                <th>Add</th>
                <th>Like</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        // Get member rows
        $result = $conn->query("SELECT * FROM Announcement " );
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['disc']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['website']; ?></td>
                <td><?php echo $row['field1']; ?></td>
				<td><?php echo $row['field2']; ?></td>
                <!-- <td>
                    <?php //echo $row['name']; ?>
                </td> -->
                <td>
                <i data="<?php echo $row['id'];?>" class="status_checks btn
                    <?php echo ($row['recommend'])?
                    'btn-success': 'btn-danger'?>"><?php echo ($row['recommend'])? 'Selecte' : 'Unselect'; ?>
                    </i>
                </td>
                <td>
                <?php
                        if (isset($_POST['liked'])) {
                            $idannouncement = $_POST['id'];
                            $result = mysqli_query($conn, "SELECT * FROM Announcement WHERE id=$idannouncement");
                            $row = mysqli_fetch_array($result);
                            $n = $row['likes'];

                            mysqli_query($conn, "INSERT INTO liketable (iduser, idannouncement) VALUES ($userid, $idannouncement)");
                            mysqli_query($conn, "UPDATE Announcement SET likes=$n+1 WHERE id=$idannouncement");

                            echo $n+1;
                            exit();
                        }
                        if (isset($_POST['unliked'])) {
                            $idannouncement = $_POST['id'];
                            $result = mysqli_query($conn, "SELECT * FROM Announcement WHERE id=$idannouncement");
                            $row = mysqli_fetch_array($result);
                            $n = $row['likes'];

                            mysqli_query($conn, "DELETE FROM liketable WHERE idannouncement=$idannouncement AND iduser=$userid");
                            mysqli_query($conn, "UPDATE Announcement SET likes=$n-1 WHERE id=$idannouncement");
                            
                            echo $n-1;
                            exit();
                        }
                ?>
                <?php 
                    ?>
                    <div class="post">
                    <!-- <?php echo $row['text']; ?> -->

                        <div style="padding: 2px; margin-top: 5px;">
                        <?php 

                            // determine if user has already liked this post
                            $results = mysqli_query($conn, "SELECT * FROM liketable WHERE iduser=$userid AND idannouncement=".$row['id']."");

                            if (mysqli_num_rows($results) == 1 ): ?>
                                <!-- user already liketable post -->
                                <span class="unlike fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span> 
                                <span class="like hide fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span> 
                            <?php else: ?>
                                <!-- user has not yet liked post -->
                                <span class="like fa fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span> 
                                <span class="unlike hide fa fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span> 
                            <?php endif ?>
                            <span class="likes_count"><?php echo $row['likes']; ?> likes</span>
                        </div>
                    </div>
                    </td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No member(s) found...</td></tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php

    
?>
<!-- script for activ and inactive -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- Start script for select  -->
<script type="text/javascript">
    $(document).on('click','.status_checks',function(){
        var status = ($(this).hasClass("btn-success")) ? '0' : '1';
        var msg = (status=='0')? 'Unselect the Announcement' : 'Select the Announcement';
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
    
<!-- end script for select  -->


<!-- Add Jquery to page -->
<script>
	$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var idannouncement = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'liked': 1,
					'idannouncement': idannouncement
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var idannouncement = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					'unliked': 1,
					'idannouncement': idannouncement
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});
</script>

<!-- Start script for like -->

<!-- End script for like -->


<?php include_once "inc/footer.php";

?>


