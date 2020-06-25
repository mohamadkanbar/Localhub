<?php
if(!isset($_POST['send'])){
?>
<form  method="post" enctype="multipart/form-data">
<input type='hidden' name='send' value='1'/>
<?php if(isset($_REQUEST['s'])):?><input type='hidden' name='src' value='<?php echo $_REQUEST['s'];?>/><?php endif;?>
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br></br></br>
<label >For Big File Enter Record Range:</label>
<label >From Line:</label><input type="text" name="from" id="from">
<label >To Line:</label><input type="text" name="from2" id="from2"></br>
<input type="submit" name="submit" value="Submit">
</form>
<?php
}
else
{
//include 'sessionh.php';
//include 'conn.php';
set_time_limit(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
	.detail{display:none;}
	.error{color:red;}
	.head {color: blue;}
</style>
</head>
</body>
<?php

$fname = upload_file();
if(!$fname){
	Echo "Error Uploading file";
	exit;
}

$titles=true;
$row = 0;
$success=0;
$errors=array();
$srec = 0;
if(isset($_POST['from']) && $_POST['from']!='')
	$srec = $_POST['from'];
$erec = 10000;
if(isset($_POST['from2']) && $_POST['from2']!=''){
	$erec = $_POST['from2'];
}
$str=file_get_contents ( $fname, false , null, -1 , 1000);
$chtype= mb_detect_encoding($str, 'UTF-8', true); 


$CategoryDefinitions = array(
	'Event' => array("date"=>"Name","note"=>"Title","note"=>"Title","itemId"=>"Field1","statementId"=>"Field2"),
	'Shop' => array(),
	'Stage' => array(),
	'Timing'=> array("StartAt":"StartAt","EndAt":"EndAt","From":"From","To":"To","WeekDay":"WeekDay"),
	);



$Category = 'Event';

$CategoryFields =$CategoryDefinitions[$Category];
$TimingFields = $CategoryDefinitions['Timing'];

if (($handle = fopen($fname, "r")) !== FALSE) {
	
	$DBMapper = [];
	$TimingDBMapper = [];
	
	$LastAnnoucmentId = 0;
	$LastAnnouncmentNumber = 0;
	
	$AnnouncementIndex=-1;
	
    while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
		$row++;
		if($row==1 && $titles){
			$titlesName =$data;
			
			foreach($titlesName as $k=>$v){
				$dbColumn = @$CategoryFields[$v];

				$DBMapper[$dbColumn]= $k;
				
				if($k == 'itemId')
					$AnnouncementIndex=$v;
			}
			foreach($titlesName as $k=>$v){
				$dbColumn = @$TimingFields[$v];

				$TimingDBMapper[$dbColumn]= $k;
			}			
				
			continue;
		}
		if($row < $srec)continue;
		if($row > $erec)break;
	    $num = count($data);
	    
	    $fields='';
	    $values='';
	    $sep='';

	   	try {
				$sql = "select * from statement where itemId ='".$data[$DBMapper['Field1']]."' and `date`='".$data[$DBMapper['Name']]."'";
				
				/*$rs = mysql_query($sql);
				$statementId = false;
				$statementNum = mysql_num_rows($rs);
				if($statementNum>1){
					echo "Error:duplicate: please check your \"Statement\" " . $data[$statementIdx];
					exit;
				}
				elseif($statementNum == 0){
					$sql = "insert into statement (itemId,`date`,note,`type`,status) values('".$data[$statementIdx]."','".$data[$dateIdx]."','".$data[$noteIdx]."',1,3)";
					mysql_query($sql);
					$id = mysql_insert_id();
					if($id)
						$statementId = $id;
					else{
						echo "Error: please check your \"Statement\" " . $data[$statementIdx];
						exit;
					}
					echo "Statement ".$data[statementIdx]." Inserted";				
				}
				else{
					$srow = mysql_fetch_object($rs);
					$statementId = $srow->id;
					
				}
				*/
				
				//If AnnoucmentNumber is the same as the old one then do not add a new one, only handle the timing
				
				
				
				$col=[];
				$val = [];
				foreach($DBMapper as $k=>$v){
					$col[] = $k;
					$val[] = $data[$v];
				}
				
				echo 'Insert into Event ('. implode($col,',') . ') values (\''. implode($val, '\',\'') . '\')';
				

				continue;
				
				$sql = "select * from items where itemId ='".$data[$itemIdx]."'";
				$rs = mysql_query($sql);
				$irow = mysql_fetch_object($rs);
				$itemId = $irow->id;
				
				
				
		 	  	$sql = "insert into quantity  (itemId,statementId,amount,unit,note) values(".$itemId.",".$statementId.",".$data[$amountIdx].",'".$data[$unitIdx]."','".$data[$noteIdx]."')";
echo $sql.'</br>';
				mysql_query($sql);
				$id = mysql_insert_id();
				if($id){
				  	$success++;
				  	echo "<div><label class='head'>Line #$row  Inserted Successfully</label></br>";
				  	echo "<label class='detail'>".implode($data," , ")."</label></div></br>";
				}
				else{
					echo "<div><label class='head'>Line #$row  Fail</label></br>";
				  	echo "<label class='detail'>".implode($data," , ")."</label></div></br>";
				}
		}
		catch (Exception $e) {
			$errors[]=$row;
			echo "<div><label class='error'>Error: Line #$row  Addign Fail</label></div></br>";
		}

	}/// end while
	if($row>$erec){
		Echo "Not All Recoreds Handled. Last Recored Handled No:".$erec.'</br>';
	}
	echo "</br>---------------------------------</br>";
	echo $success.'  Imported Successfully.</br>';
	echo 'Errors:</br>'. count($errors).'  Failed to Import.';
} // end if
?>
</body>
</html>
<?php
}// end if(!isset)
function upload_file(){
	$allowedExts = array("csv", "txt");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);

	if (
		($_FILES["file"]["size"] <  1 * 1024 * 1024 ) // only 1 Mb
		&& in_array($extension, $allowedExts)) {
		if ($_FILES["file"]["error"] > 0) {
			echo "Error: " . $_FILES["file"]["error"] . "<br>";
		}
		else {
			//echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			//echo "Type: " . $_FILES["file"]["type"] . "<br>";
			//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
			if (file_exists("upload/" . $_FILES["file"]["name"])) {
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else {
				move_uploaded_file($_FILES["file"]["tmp_name"],
				"tmp/" . $_FILES["file"]["name"]);
				//echo "Stored in: " . "mass/" . $_FILES["file"]["name"];
				return "tmp/" .$_FILES["file"]["name"];
			}
		}
	} else {
	  echo "Invalid file";
	  return false;
	}
}
function getColumnIndex($index,$column)
{
	foreach($index as $key=>$value)
		if($value == $column)
			return $key;
	
	return -1;
}
function getIdByNO($table,$fileNumber){
	$rs = mysql_query("select * from $table where itemId ='$fileNumber'");
	if(mysql_error()!==''){
		echo $rs;
		echo mysql_error();
	}
	$arr=array();
	while ($row = mysql_fetch_assoc($rs)) {
    	$arr[]=$row;
    }
	return $arr[0]['id'];
}
function detectUTF8($string)
{
        return preg_match('%(?:
        [\xC2-\xDF][\x80-\xBF]        # non-overlong 2-byte
        |\xE0[\xA0-\xBF][\x80-\xBF]               # excluding overlongs
        |[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}      # straight 3-byte
        |\xED[\x80-\x9F][\x80-\xBF]               # excluding surrogates
        |\xF0[\x90-\xBF][\x80-\xBF]{2}    # planes 1-3
        |[\xF1-\xF3][\x80-\xBF]{3}                  # planes 4-15
        |\xF4[\x80-\x8F][\x80-\xBF]{2}    # plane 16
        )+%xs', $string);
}
?>