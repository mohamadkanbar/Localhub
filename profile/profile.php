<?php 
include_once 'inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
include_once "../Core/config2.php";
?>
<h1 style=" margin:10px; color: green;" > My selected list from the announcements </h1>
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
            <th>id</th>

                <th>title</th>
                <th>disc</th>
                <th>location</th>
                <th>phone</th>
                <th>email</th>
                <th>website</th>
                <th>Start Date </th>
				<th>End Date </th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT Announcement.id, Announcement.title, Announcement.disc, Announcement.title,Announcement.location, Announcement.phone, Announcement.email, Announcement.website, Announcement.field1, Announcement.field2, favorite_profile.id FROM Announcement  Right JOIN  favorite_profile ON favorite_profile.AnnouncementId  = Announcement.id
        ");
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
                <td><a href="delete.php?id=<?php  echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
     
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No member(s) found...</td></tr>
        <?php }?>
        </tbody>
    </table>
</div>
</main>
<?php include_once "inc/footer.php";