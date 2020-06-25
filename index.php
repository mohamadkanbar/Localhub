<?php 
include_once 'inc/topHeader.php' ?>
<title><?php echo SITENAME;?> </title>
<?php
include_once "inc/header.php";
include_once "inc/navbar.php";

include_once "Core/config2.php";
?>
<main class="container">
	<!-- <?php
	$result = mysqli_query($conn, "SELECT * FROM csvtable ORDER BY ID_CSV DESC");
		// boucle pour lister le résultat
		while($response = mysqli_fetch_array($result)) {
			echo '<div class="card d-flex justify-content-around row-hl" >';
			echo '<div class="card-body p-4 item-hl">';

			echo '<h4 class="card-text">Annonces :';  
			echo $response['Nom_du_poste'];
			echo '</h4>';

			echo '<h6 class="card-title">Nom_entreprise :';  
			echo $response['Nom_entreprise'];
			echo '</h6>';

			echo '<h6 class=<card-text>ville :';  
			echo $response['ville'];
			echo '</li>';

			echo '<h6 class="card-text">Nom_du_poste :';  
			echo $response['Nom_du_poste'];
			echo '</h6>';


			echo '<h6 class="card-text">Date_de_debut :';  
			echo $response['Date_de_debut'];
			echo '</h6>';

			echo '<h6 class="card-text">Descrption_du_poste :';  
			echo $response['Descrption_du_poste'];
			echo '</h6>';

			echo '<a class="btn btn-outline-primary" href="#">Read more';  
			echo '</a>';

			echo '</div>';
			echo '</div>';
		}
	?> -->
 

    <!-- <div class="col">Column</div>
    <div class="w-100"></div>
    <div class="col">Column</div>
    <div class="col">Column</div>
  </div> -->


  <div class="d-flex justify-content-center">
  <h1 style="color:brown; margin:10px; "> List Of Announcement</h1>
  </div>
  
 <?php  
 include_once "Core/config2.php";

 $query ="SELECT * FROM csvtable ORDER BY ID_CSV desc";  
 $result = mysqli_query($conn, $query);  
 while($row = mysqli_fetch_array($result))  
 {  
 ?>  

<div class="container">
  <div class="row align-items-start">
    <div class="col">

    <div class="card border-primary mb-3" style="max-width: 18rem; margin:10px;">
    <div class="card-header"><?php echo $row["Nom_entreprise"]; ?></div>
    <div class="card-body text-primary">
        <h5 class="card-title"><?php echo $row["ville"]; ?></h5>
		<p class="card-text"><?php echo $row["Descrption_du_poste"]; ?></p>

	</div>
	</div>
	</div>
	<div class="col">
		
	<div class="card border-primary mb-3" style="max-width: 18rem; margin:10px;">
	<div class="card-header"><?php echo $row["Nom_entreprise"]; ?></div>
	<div class="card-body text-primary">
		<h5 class="card-title"><?php echo $row["ville"]; ?></h5>
		<p class="card-text"><?php echo $row["Descrption_du_poste"]; ?></p>

	</div>
	</div>
	</div>
	<div class="col">
	
	<div class="card border-primary mb-3" style="max-width: 18rem; margin:10px;">
	<div class="card-header"><?php echo $row["Nom_entreprise"]; ?></div>
	<div class="card-body text-primary">
		<h5 class="card-title"><?php echo $row["ville"]; ?></h5>
		<p class="card-text"><?php echo $row["Descrption_du_poste"]; ?></p>

	</div>
	</div>
	</div>
	</div>
	</div>
    <?php
 }
 ?>
</main>
<?php 
 include("inc/footer.php");
 ?>
