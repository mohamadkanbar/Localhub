
<title>Localhub</title>
<?php
// include("importCSV.php");

include "inc/header.php";

include_once __DIR__."/../Core/config2.php";
?>
<h1>شرح ملف csv المراد تعبئته </h1>
<main class="container">
<?php
mysqli_set_charset($conn,'utf8');

if(isset($_POST["Import"]))
{
    $filename=$_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $sqlInsert="INSERT into csvtable(Nom_entreprise, ville, Nom_du_poste, Descrption_du_poste, Date_de_debut) values('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."','".$column[4]."')";
            $result=mysqli_query($conn,$sqlInsert);
        }
    }
}
?>
        <br>
        <form style="margin: 10px" method="post" name="uploadCsv" enctype="multipart/form-data">
            <div>
                <label class=" btn-light" >chose file csv: </label>
                <div class="input-group mb-3">
                <span class="input-group-text"><input type="file" name="file" accept=".csv"></span>
                </div>
            <br>
            <button class="btn btn-primary" type="submit" name="Import" >Import</button>
            </div>
        </form>
<br>

</main>

<?php
include("inc/footer.php");
?>

