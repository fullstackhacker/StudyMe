<?php 
session_start();
$user->firstname = $_SESSION['firstname']; 
$user->lastname = $_SESSION['lastname'];
$user->email  = $_SESSION['email']; 
$user->usertype = $_SESSION['usertype'];

session_destroy();
?>

<html>
	<head>
		<title><?php echo $user->firstname; ?> gets PAID</title>
		<!--meta tags-->	
		<meta charset="UTF-8">
		<meta name="author" content="Mushaheed Kapadia">
		<meta name="keywords" content="rutgers paid studies">
		<meta name="description" content="<?php echo $user->firstname; ?> is getting paid to get studied.">
		<!--javascript & jquery-->
		<script src="scripts/jquery-2.1.0.min.js"></script>
		<script src="scripts/user.js"></script>
		<!--css stylesheets-->
		<link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/user.css">
		<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<header>
			New Studies	
		</header>
	</body>
</html>
