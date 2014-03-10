<?php
//start the session
session_start(); 

//get the session vars
$studyname = $_SESSION['studyname']; 
$studresearcher = $_SESSION['studyreseacher']; 
$studyfunding = $_SESSION['studyfunding'];
$studystartdate = $_SESSION['studystartdate']; 
$studyenddate = $_SESSION['studyenddate']; 
$studystarttime = $_SESSION['studystarttime']; 
$studyendtime = $_SESSION['studyendtime']; 
$studyquestionairre = $_SESSION['studyquestionairreid'];

//end the session 
session_destroy(); 
?>
