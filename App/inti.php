<?php
ob_start();
session_start();
require_once __DIR__.'/../Core/config.php';
require_once __DIR__.'/../App/Interfaces/InterfaceDatabase.php';
//for create classes in my project
spl_autoload_register(function($name){
    require_once __DIR__."/../Classes/{$name}.class.php";
});
// session_destroy();
// echo "<pre>";
// print_r($_SESSION);
// die();

if(isset($_GET['logout']) and $_GET['logout'] == TRUE){
    session_unset();
    session_destroy();
    header("Location: index.php");
} 
// spl_autoload_register( function($name) {
//     if (is_file('/Classes/'.$name.'.class.php')) {
//         require_once('/Classes/'.$name.'.class.php');
//     }
// });
// $DB = new MysqliConnect();

// $DB->insert('user','name, email, password', "'moham','mohamed@gmail.ocm','123'");
// $DB->insert('users','name, email, pass',"'mohamed33','maohmedkan@gmail.com', 'fsdfsdfdfs'");
// $DB->execute();
?>

