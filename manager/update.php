<?php include "inc/topHeader.php" ?>
<title>Localhub</title>
<?php
// include("importCSV.php");

include "inc/header.php";
include "inc/navbar.php";
include "inc/slidebar.php";
require_once "App/Interfaces/InterfaceDatabase.php";

include "Core/config2.php";

if(isset($_POST['update']))
{
    $idToBDD 	= mysqli_real_escape_string($DB, $_POST['idForm']);
    $Nom_entrepriseToBDD 	= mysqli_real_escape_string($DB, $_POST['Nom_entrepriseForm']);
	$villeToBDD 	= mysqli_real_escape_string($DB, $_POST['villeForm']);
	$Nom_du_posteToBDD 	= mysqli_real_escape_string($DB, $_POST['Nom_du_posteForm']);
	$Descrption_du_posteToBDD = mysqli_real_escape_string($DB, $_POST['Descrption_du_posteForm']);
	$Date_de_debutToBDD = mysqli_real_escape_string($DB, $_POST['Date_de_debutForm']);
	//requete sql
	// mysqli_query(CONNEXION, QUERY)
	$result = mysqli_query($conn, "UPDATE csvtable
		SET Nom_entreprise='$Nom_entrepriseToBDD', ville='$villeToBDD', Nom_du_poste='$Nom_du_posteToBDD', Descrption_du_poste='$Descrption_du_posteToBDD', Date_de_debut='$Date_de_debutToBDD'
        
		WHERE ID_CSV='$idToBDD'");
} // end update SQL

//getting id from url
$idFromURL = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM csvtable WHERE ID_CSV=$idFromURL");

while($response = mysqli_fetch_array($result))
{
	$Nom_entreprise = $response['Nom_entreprise'];
	$ville 	= $response['ville'];
    $Nom_du_poste 	= $response['Nom_du_poste'];
    $Descrption_du_poste = $response['Descrption_du_poste'];
    $Date_de_debut 	= $response['Date_de_debut'];

}
?>
<br>
<form name="form1" method="post" action="update.php">
	<ul> 
		<li><input type="text" value="<?php echo $Nom_entreprise;?>" name="Nom_entrepriseForm"> Nom_entreprise</li>
		<li><input type="text" value="<?php echo $ville;?>" name="villeForm"> ville</li>
		<li><input type="text" value="<?php echo $Nom_du_poste;?>" name="Nom_du_posteForm"> Nom_du_poste</li>
		<li><input type="text" value="<?php echo $Descrption_du_poste;?>" name="Descrption_du_posteForm"> Descrption_du_poste</li>
		<li><input type="date" value="<?php echo $Date_de_debut;?>" name="Date_de_debutForm"> Date_de_debut</li>
		<li><input type="hidden" name="idForm" value="<?php echo $_GET['id'];?>"></li>
		<li><input type="submit" name="update" value="Update"></li>
	</ul>
</form>



<?php
include("inc/footer.php");
?>