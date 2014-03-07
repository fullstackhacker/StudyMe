<?php 

session_start();

$user->firstname = $_SESSION['firstname']; 
$user->lastname = $_SESSION['lastname'];
$user->email  = $_SESSION['email']; 
$user->usertype = $_SESSION['usertype'];

session_destroy();

echo $user->firstname; 

?>
