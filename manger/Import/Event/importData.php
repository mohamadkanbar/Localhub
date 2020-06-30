<?php
// Load the database configuration file
session_start();

$id = $_SESSION['user']["id"];

include_once '../../../Core/config2.php';
error_reporting(-1);
if(isset($_POST['importSubmit'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){

        $fc = iconv('Windows-1252', 'utf-8', file_get_contents($_FILES['file']['tmp_name']));
        
        // var_dump(file_get_contents($_FILES['file']['tmp_name']));
        // echo 'start dumping'; var_dump($fc);exit;

        file_put_contents('tmp/import.tmp', $fc);
        $handle = fopen('tmp/import.tmp', "r");


        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
            // var_dump($line); exit();

                // title	disc	location	phone	website	email	field1	field2
                // Get row data
                $title   = $line[0];
                $disc  = $line[1];
                $location  = $line[2];
                $phone = $line[3];
                $website = $line[4];
                $email = $line[5];
                $start = $line[6];
                $end = $line[7];
      
// var_dump($line);
                // Check whether member already exists in the database with the same email
                // $prevQuery = "SELECT id FROM Announcement WHERE email = '".$line[1]."'";
                // $prevResult = $conn->query($prevQuery);
                
                // if($prevResult->num_rows > 0){
                    // Update member data in the database
                //     $conn->query("UPDATE Announcement SET name = '".$name."', phone = '".$phone."', status = '".$status."', modified = NOW() WHERE email = '".$email."'");
                // }else{
                    // Insert member data in the database
                    // $sql =  "INSERT INTO Announcement (title, disc,location, phone, website, email, field1, field2, created,categoryid, userid ) VALUES ('$title', '".$disc."', '".$location."', '".$phone."', '".$website."', '".$email."', '".$field1."', '".$field2."', NOW(),9,$id)";

                    // echo $sql;
                    $conn->query("INSERT INTO Announcement (title, disc,location, phone, website, email, field1, field2, created,categoryid, userid ) VALUES ('$title', '$disc', '".$location."', '".$phone."', '".$website."', '".$email."', '".$start."', '".$end."', NOW(),9,$id)");

                // }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = header("location: index.php");
        }else{
            $qstring = '?status=err';
        }
    }else{
        header("location: index.php");
        $qstring = '?status=invalid_file';
    }
}
echo $qstring;
// Redirect to the listing page
// header("Location: index.php".$qstring);