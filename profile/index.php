
<?php 
include_once 'inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
include_once "../Core/config2.php";


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
                <!-- <td><?php echo $row['name']; ?></td> -->
                <td>

                </td>

                <td>
                    <i data="<?php echo $row['id'];?>" class="status_checks btn
                    <?php echo ($row['recommend'])?
                    'btn-success': 'btn-danger'?>"><?php echo ($row['recommend'])? 'Like' : 'Unlike'; ?>
                    </i>
                    <i style="font-size: 12px;"><?php 
                        $result2= mysqli_query($conn, "SELECT COUNT(id) AS totalsum FROM liketable");

                        $row = mysqli_fetch_assoc($result2); 
                        
                        $sum = $row['totalsum'];
                        
                        echo ($sum);
                    ?></i>
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

<!-- script for select  -->


<!-- script for like -->
    <script type="text/javascript">
    $(document).on('click','.status_checks',function(){
        var status = ($(this).hasClass("btn-success")) ? '0' : '1';
        var msg = (status=='0')? 'Unlike the Announcement' : 'Like the Announcement';
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

<?php include_once "inc/footer.php";

?>


