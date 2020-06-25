<?php 
include "inc/topHeader.php" ?>
<title>Localhub</title>
<?php
// include("importCSV.php");

include "inc/header.php";
include "inc/navbar.php";
include "Core/config2.php";
?>


<h2>List of Jobs</h2>
<?php
// $read = $conn->prepare("SELECT * From csvtable");
// $read->execute();
// echo "<pre>";
// var_dump($read);
// echo "</pre>";

$result = mysqli_query($conn, "SELECT * FROM csvtable ORDER BY ID_CSV DESC");
	// boucle pour lister le résultat
	while($response = mysqli_fetch_array($result)) {
		echo "<ul>\n";
		echo "	<li>Name : ".$response['Nom_entreprise']."</li>\n";
		echo "	<li>Ville :".$response['ville']."</li>\n";
        echo "	<li>Nom_du_poste :".$response['Nom_du_poste']."</li>\n";
        echo "	<li>Descrption_du_poste :".$response['Descrption_du_poste']."</li>\n";
        echo "	<li>Date_de_debut :".$response['Date_de_debut']."</li>\n";

		// echo "	<li><a href=\"update.php?id=".$response['ID_CSV']."\">edit</a> </li>\n";
		echo "</ul>\n";
	}
// <a href=\"delete.php?id=".$response['ID_CSV']."\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
// echo '<a href="index.php">Back Home</a>';
include("inc/footer.php");
?>
