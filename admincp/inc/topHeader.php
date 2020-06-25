<?php

// session_start();
require '../App/inti.php';

if(!isset($_SESSION) || !isset($_SESSION['user']) || !$_SESSION['user']["isAdmin"])
header("location: ../register.php");
// require 'App/inti.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

