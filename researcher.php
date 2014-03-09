<?php

//researcher will need moderator confrimation

$formtype = $_POST['form'];

//global vars for create study
//form inputs
$studyname = ""; 
$studyresearcher = "";
$studyfunding = ""; 
$studystartdate = ""; 
$studyenddate = ""; 
$studystarttime = "";
$studyendtime = "";
$studyquestion = ""; 
//form errors
$studyname_error = ""; 
$studyresearcher_error = "";
$studyfunding_error = ""; 
$studystartdate_error = "";
$studyenddate_error = ""; 
$studystarttime_error = ""; 
$studyendtime_error = ""; 

//global vars for questionairre


//if the researcher wants to create a study
if(strcmp($formtype, "createstudy")==0){
	createstudy(); 
}

//start the session 
session_start(); 

//get user info
$user->firstname = $_SESSION['firstname']; 
$user->lastname = $_SESSION['lastname'];
$user->email = $_SESSION['email']; 

//destroy the session
session_destroy();


function createstudy(){ 
	//form inputs
	global $studyname; 
	global $studyresearcher; 
	global $studyfunding; 
	global $studystartdate; 
	global $studyenddate; 
	global $studystarttime; 
	global $studyendtime; 
	//form errors
	global $studyname_error; 
	global $studyresearcher_error; 
	global $studyfunding_error; 
	global $studystartdate_error; 
	global $studyenddate_error; 
	global $studystarttime_error; 
	global $studyendtime_error; 

	$valid = true; //valid form identifier

	//validate study name 
	if(!(empty($_POST['studyname']))){
		$studyname = validate($_POST['studyname']); 
	}
	else{
		$studyname_error = "Name of Study is required"; 
		$valid = false; 	
	}
	
	//validate study reseacher	
	if(!(empty($_POST['studyresearcher']))){
		$studyreseacher = validate($_POST['studyresearcher']); 
	}
	else{ 
		$studyresearcher_error = "Researcher name is required"; 
		$valid = false; 
	}

	//validate study funding 
	if(!(empty($_POST['studyfunding']))){
		$studyfunding = validate($_POST['studyfunding']); 
	}
	else{
		$studyfunding_error = "You can put 0 if you do not wish to disclose this amount";
		$valid = false; 
	}

	//validate start date 
	if(!(empty($_POST['studystartdate']))){
		$studystartdate = $_POST['studystartdate']; 
	}
	else{
		$studystartdate_error = "Please enter valid start date"; 
		$valid = false; 
	}

	//validate end date
	if(!(empty($_POST['studyenddate']))){
		$studyenddate =  $_POST['studyenddate']; 
	}
	else{
		$studyenddate_error = "Please enter a  valid end date"; 
		$valid = false; 
	}

	//validate start time 
	if(!(empty($_POST['studystartime']))){
		$studystarttime = $_POST['studystartime']; 
	}
	else{
		$studystartime_error = "Please enter a valid start time";
		$valid = false; 
	}

	//validate end time 
	if(!(empty($_POST['studyendtime']))){
		$studyendtime = $_POST['studyendtime']; 
	}
	else{ 
		$studyendtime_error = "Please enter a valid end time"; 
		$valid = false; 
	}
}

function validate($data){
	$data = trim($data); 
	$data = stripslashers($data); 
	$data = htmlspecialchar($data); 
	return $data; 
?>

<html>
	<head>
		<title><?php echo $user->firstname; ?> Pays! Thank you!</title>
		<!--meta tags-->	
		<meta charset="UTF-8">
		<meta name="author" content="Mushaheed Kapadia">
		<meta name="keywords" content="rutgers paid studies">
		<meta name="description" content="<?php echo $user->firstname; ?> is getting paid to get studied.">
		<!--javascript & jquery-->
		<script src="scripts/jquery-2.1.0.min.js"></script>
		<script src="scripts/researcher.js"></script>
		<script>
			$(document).ready(function(){
				$("#create").click(function(){
					$("#create").fadeTo("fast", 1.0); 
					$("#review").fadeTo("fast", 0.3);
					$("#questions").fadeTo("fast", 0.3);
					$("#settings").fadeTo("fast", 0.3);
					$("#createbox").fadeIn();
					$("#reviewbox").hide(); 
					$("#questionbox").hide(); 
					$("#settingbox").hide();
				});
				$("#review").click(function(){
					$("#create").fadeTo("fast", 0.3); 
					$("#review").fadeTo("fast", 1.0); 
					$("#questions").fadeTo("fast", 0.3); 
					$("#settings").fadeTo("fast", 0.3); 
					$("#createbox").hide(); 
					$("#reviewbox").fadeIn(); 
					$("#questionbox").hide(); 
					$("#settingbox").hide(); 
				});
				$("#questions").click(function(){
					$("#create").fadeTo("fast", 0.3); 
					$("#review").fadeTo("fast", 0.3); 
					$("#questions").fadeTo("fast", 1.0); 
					$("#settings").fadeTo("fast", 0.3);
					$("#createbox").hide(); 
					$("#reviewbox").hide(); 
					$("#questionbox").fadeIn(); 
					$("#settingbox").hide(); 
				});
				$("#settings").click(function(){
					$("#create").fadeTo("fast", 0.3); 
					$("#review").fadeTo("fast", 0.3);
					$("#questions").fadeTo("fast", 0.3); 
					$("#settings").fadeTo("fast", 1.0); 
					$("#createbox").hide(); 
					$("#reviewbox").hide(); 
					$("#questionbox").hide();
					$("#settingbox").fadeIn(); 
				});
			});
		</script>
		<!--css stylesheets-->
		<link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/researcher.css">
		<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="drawer">
			<ul id="bartab">
				<li id="create" class="tab start"><a href="#createbox">Create Study</a></li>
				<li id="review" class="tab"><a href="#reviewbox">Review Studies</a></li>
				<li id="questions" class="tab"><a href="#questions">Questionairres</a></li>
				<li id="settings" class="tab"><a href="#settings">Settings</a></li>
			</ul>
			<div id="createbox" class="box start">
				<form id="createstudy" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
					<input class="hidden" name="form" value="createstudy">
					<input placeholder="Name of Study" type="text" name="studyname" value="<?php echo $studyname; ?>">* <?php $studyname_error;?><br>
					<input placeholder="Reseacher" type="text" class="forminput" name="studyreseacher" value="<?php echo $studyresearcher;?>" >* <?php $studyresearcher_error; ?><br>
					<input placeholder="Funding" type="text" class="forminput" name="studyfunding" value="<?php echo $studyfunding;?>" ><br>
					<label>Start Date: </label><input placeholder="Start Date" type="date" name="studystartdate" value="<?php echo $studystartdate;?>">* <?php echo $studystartdate_error; ?><br>
					<label>End Date: </label><input placeholder="End Date" type="date" name="studyenddate" value="<?php echo $studyenddate;?>">* <?php echo $studyenddate_error; ?><br>
					<label>Start Time: </label><input placeholder="Start Time" type="time" name="studystarttime" value="<?php echo $studystarttime; ?>">* <?php echo $studystarttime_error; ?><br>
					<label>End Time: </label><input placeholder="End Date" type="time" name="studyendtime" value="<?php echo $studyendtime; ?>">* <?php $studyendtime_error; ?><br>
					<select placeholder="Questionaires" name="studyquestions">
					</select><br>
					<input type="submit" value="submit">
				</form>
			</div>
			<div id="reviewbox" class="box">
				review box
			</div>
			<div id="questionbox" class="box">
				questions
			</div>
			<div id="settingbox" class="box">
				settings
			</div>
		</div>
	</body>
</html>
