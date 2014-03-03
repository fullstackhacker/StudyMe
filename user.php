<?php 

session_start();

$user->firstname = $_SESSION['fname']; 

echo $user->firstname; 

?>
