<?php
//Include functions

//Open ob_start and session_start functions
    ob_start();
    session_start();


include('includes/function.php');

?>

<?php 

require('includes/pdocon.php');
//instatiating our database objects
$db = new Pdocon;

//Create a query to select all users to display in the table
   
$db->query("SELECT * FROM admin WHERE email=:email");

$email  =   $_SESSION['user_data']['email'];

$db->bindValue(':email', $email, PDO::PARAM_STR);
    
//Fetch all data and keep in a result set
$row = $db->fetchSingle();

?>

  <?php
  include('includes/header.php'); 
  
   ?>