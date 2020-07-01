<?php 
include_once 'inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "inc/header.php";
include_once "inc/navbar.php";
include_once "../Core/config2.php";
?>
<?php
    // if (isset($_GET['search']) || !empty($_GET['search'])) {
    //     $search = mysqli_real_escape_string($db->link, $fm->validation($_GET['search']));
    // }
    // else{
    //     header("Location:404.php");
    // }
?>
<?php
    // $query = "SELECT * FROM news_post WHERE title LIKE '%$search%' OR body LIKE '%$search%' OR tags LIKE '%search%'";
    // $post = $db->select($query);
    // if ($post) {
    //     while ($result = $post->fetch_assoc()) {
    //         echo"Database data like, $result['title']";
    //     }
    // }
    // else{
    //     echo "result Not found";
    // }
?>
<div class="row">
    <!-- CSV file upload form -->
    <div class="col-md-10" id="importFrm" style="display: none; margin:10px;">
        <form action="importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        </form>
    </div>
    <?php $search = $_GET['search']; ?>
    <h1 style="padding: 20px; margin-left: 20px; color:green;">Search Results for: "<?php echo $search;?>"</h1>
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
            </tr>
        </thead>
        <tbody>
        <?php
        $id=$_SESSION['user']['id'];

        if (isset($_GET['search']) || !empty($_GET['search'])) {
                $keyword = $_GET['search'];
        $result = $conn->query("SELECT  * FROM Announcement WHERE title LIKE '%" .$keyword. "%' AND isActive=1 ")
        ;
        // $query = "(SELECT id, title, disc , phone, location, email, website FROM Announcement WHERE title LIKE '%" .$keyword. "%' OR disc LIKE '%" . $keyword ."%') 
        //    UNION
        //    (SELECT content, title, 'topic' as type FROM topics WHERE content LIKE '%" . 
        //    $keyword . "%' OR title LIKE '%" . $keyword ."%') 
        //    UNION
        //    (SELECT content, title, 'comment' as type FROM comments WHERE content LIKE '%" . 
        //    $keyword . "%' OR title LIKE '%" . $keyword ."%')";
        // mysqli_query($query);

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
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No member(s) found...</td></tr>
        <?php } }?>
        </tbody>
    </table>
</div>
<?php
require 'inc/footer.php';
?>