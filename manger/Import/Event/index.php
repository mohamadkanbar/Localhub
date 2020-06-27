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
// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'csvtable data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>
<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>
<div class="row">
    <!-- Import & Export link -->
    <div class="col-md-10 head">
        <div class="float-right" style="margin: 10px;">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');" style="margin: 10px;"><i class="plus"></i> Import List of CSV file</a>
            
            <a href="create.php" class="btn btn-success"  style="margin: 10px; color:aliceblue;"><i class="plus"></i> Add New Event</a>
            <a href="../inc/files/Events.csv" download class="btn btn-success" style="margin: 10px; color:aliceblue;"><i class="plus" >Download CSV file example for filling in data</a>            
        </div>
    </div>
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
                <th>Update</th>
                <th>Delete</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Get member rows
        $id = $_SESSION["user"]["id"];
        $result = $conn->query("SELECT * FROM Announcement WHERE userid=$id");
        
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
                <td><a href="update.php?id=<?php  echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                <td><a href="delete.php?id=<?php  echo $row['id']; ?>" class="btn btn-success">Delete</a></td>
                <td>
                    <i data="<?php echo $row['id'];?>" class="status_checks btn
                    <?php echo ($row['isActive'])?
                    'btn-success': 'btn-danger'?>"><?php echo ($row['isActive'])? 'Active' : 'Inactive'; ?>
                    </i>
                </td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No member(s) found...</td></tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- script for activ and inactive -->
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
    $(document).on('click','.status_checks',function(){
        var status = ($(this).hasClass("btn-success")) ? '0' : '1';
        var msg = (status=='0')? 'Deactivate the Announcement' : 'Activate the Announcement';
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
<script>
// For downloae fils CSV
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
<?php
require_once '../inc/footer.php';
?>