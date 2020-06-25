<?php

require '../../../App/inti.php';
// require 'App/inti.php';
if(!isset($_SESSION) || !isset($_SESSION['user']) || !$_SESSION['user']["isAdmin"])
    header("Location: ../../../register.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

