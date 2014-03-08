<?php
//researcher will need moderator confrimation

//start the session 
session_start(); 

//get user info
$user->firstname = $_SESSION['firstname']; 
$user->lastname = $_SESSION['lastname'];
$user->email = $_SESSION['email']; 

//destroy the session
session_destroy();
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
					$("#createbox").fadeIn(1000);
					$("#reviewbox").fadeOut(); 
					$("#questionbox").fadeOut(); 
					$("#settingbox").fadeOut();
				});
				$("#review").click(function(){
					$("#create").fadeTo("fast", 0.3); 
					$("#review").fadeTo("fast", 1.0); 
					$("#questions").fadeTo("fast", 0.3); 
					$("#settings").fadeTo("fast", 0.3); 
					$("#createbox").fadeOut(); 
					$("#reviewbox").fadeIn(1000); 
					$("#questionbox").fadeOut(); 
					$("#settingbox").fadeOut(); 
				});
				$("#questions").click(function(){
					$("#create").fadeTo("fast", 0.3); 
					$("#review").fadeTo("fast", 0.3); 
					$("#questions").fadeTo("fast", 1.0); 
					$("#settings").fadeTo("fast", 0.3);
					$("#createbox").fadeOut(); 
					$("#reviewbox").fadeOut(); 
					$("#questionbox").fadeIn(1000); 
					$("#settingbox").fadeOut(); 
				});
				$("#settings").click(function(){
					$("#create").fadeTo("fast", 0.3); 
					$("#review").fadeTo("fast", 0.3);
					$("#questions").fadeTo("fast", 0.3); 
					$("#settings").fadeTo("fast", 1.0); 
					$("#createbox").fadeOut(); 
					$("#reviewbox").fadeOut(); 
					$("#questionbox").fadeOut();
					$("#settingbox").fadeIn(1000); 
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
				createbox
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
