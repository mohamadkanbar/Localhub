
<?php

include_once '../Core/config2.php';
session_start();


if(isset($_POST["add_button"])){

    echo "<button data-type='delete' name='delete' value='testing'>Delete</button>";

}


if(isset($_POST["delete_button"])){

    echo "<button data-type='add' name='add' value='testing'>Add</button>";

}


?>