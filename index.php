<?php
require('scrypt.php');

session_start(); 
//defining vars
$ufname = "";
$ulame = ""; 
$uemail = ""; 
$upass = ""; 
$urpass = ""; 
$utype = ""; 
$fname_error = "";
$lame_error = ""; 
$email_error = "";
$pass_error = "";
$rpass_error = "";
$type_error = "";
$lemail_error = ""; 
$lpass_error = "";

//the rest of this script only validates form input and encrypts passwords
$formtype = $_POST['form']; 

if(strcmp($formtype, "login")==0){
	login(); 
}
elseif(strcmp($formtype, "register")==0){
	register(); 
}

function login() { 
	//use global vars
	global $uemail; 
	global $upass;
	global $lemail_error;
	global $lpass_error; 
	$valid = true;
	//validate the inputs to make sure they're not evil
	if(empty($_POST['lemail'])){
		$lemail_error = "Must enter a valid email"; 
		$valid = false;
	}
	else {
		$uemail = validate($_POST['lemail']);
	}

	if(empty($_POST['fastpass'])){
		$lpass_error = "Must enter a password"; 
		$valid = false; 
	}
	else{ 
		$upass = validate($_POST['fastpass']); 
	}

	//if all inputs are *possible* valid inputs
	if($valid == true){ 
		//store these in the session
		$_SESSION['email'] = $uemail; 
		$_SESSION['pass'] = $upass; 
		header('Location: login.php');
	}
}

function register() {	
	//use global vars
	global $ufname; 
	global $ulame; 
	global $uemail; 
	global $upass; 
	global $urpass; 
	global $utype;
	global $fname_error; 
	global $lname_error; 
	global $email_error; 
	global $pass_error;
	global $rpass_error; 
	global $type_error; 
	$valid = true;

	//check if the first name spot is empty
	if(empty($_POST['fname'])){
		$fname_error = '<span class="error">First name is Required</span>'; 
		$valid = false; 
	}
	else{
		$ufname = validate($_POST['fname']); 
	}

	if(empty($_POST['lname'])){
		$lname_error = '<span class="error">Last name is Required</span>';
		$valid = false; 
	}
	else{
		$ulame = validate($_POST['lname']);
	}

	if(empty($_POST['email'])){
		$email_error = '<span class="error">Email is Required</span>';
		$valid = false; 
	}
	else{
		$uemail = validate($_POST['email']); 
		if(strpos($uemail, "rutgers.edu")==FALSE){
			$email_error = '<span class="error">Need a valid Rutgers email!</span>'; 
			$valid = false; 
		}
	}

	if(empty($_POST['passpass'])){
		$pass_error = '<span class="error">Password is Required</span>';
		$valid = false; 
	}
	else{
		$upass = validate($_POST['passpass']); 
	}

	if(empty($_POST['rpassword'])){
		$rpass_error = '<span class="error">Retyping your password is Required</span>'; 
		$valid = false; 
	}
	else{
		$urpass = validate($_POST['rpassword']); 
		if(strcmp($upass, $urpass)!=0){
			$pass_error = $rpass_error = '<span class="error">Passwords do not match</span>'; 	
			$valid = false; 
		}
	}

	
	$utype = validate($_POST['type']); 
	
	if(strcmp($utype, "placeholder")==0){
		$type_error = '<span class="error">Invalid User Type</span>'; 
		$valid = false; 
	}
	
	//if all inputs are *possible* inputs
	if($valid == true){
		$encrypt = Password::hash($upass);
		$_SESSION['fname'] = $ufname; 
		$_SESSION['lname'] = $ulame; 
		$_SESSION['email'] = $uemail; 
		$_SESSION['pass'] = $encrypt; 
		$_SESSION['type'] = $utype; 

		header("Location: register.php"); 
	}
}

function validate($data){
	$data = trim($data);
	//$data = stripslashes($data); 
	$data = htmlspecialchars($data); 
	return $data; 
}
// */
?>

<html>
	<head>
		<title>StudyMe - Get Paid to Get Studied</title>
		<!--meta tags-->
		<meta name="description" content="Getting paid to get studied">
		<meta name="keywords" content="paid studies rutgers">
		<meta name="author" content="Mushaheed Kapadia">
		<meta charset="UTF-8">
		<!--javascript & jquery attachments-->
		<script src="scripts/jquery-2.1.0.min.js"></script> 
		<script src="scripts/home.js"></script>
		<!-- css stylesheets-->
		<link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
		<link rel="stylesheet" type="text/css" href="stylesheets/home.css">
		<link href='http://fonts.googleapis.com/css?family=Gafata' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<header>
		<h1>Study Me: Get Paid to Get Studied</h1>
		<form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input class="hidden" name="form" value="login">
				<input class="logger" type="email" placeholder="Email"  name="lemail"><br>
				<input class="logger" type="password" placeholder="Password" name="fastpass"><br>
				<input id="lsubton" type="submit" value="Log In">
			</form>
		</header>
		<div id="loginsec">
		<form id="register" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">	
			<input class="hidden" name="form" value="register">
			<input class="formtext" placeholder="First Name" type="text" name="fname"> * <?php echo $fname_error;?><br>
			<input class="formtext" placeholder="Last Name" type="text" name="lname"> * <?php echo $lname_error; ?><br>
			<input class="formtext" placeholder="Email" type="email" name="email"> * <?php echo $email_error; ?><br>
			<input class="formtext" placeholder="Password" type="password" name="passpass"> * <?php echo $pass_error; ?><br>
			<input class="formtext" placeholder="Re-type Password" type="password" name="rpassword"> * <?php echo $rpass_error; ?><br>
			<select id="options"  name="type">
					<option id="ph" value="placeholder">User Type</option> 
					<option value="student">Student</option>
					<option value="researcher">Researcher</option>
					</select>* <?php echo $type_error; ?><br>
				<input class="formbutton" type="submit" value="Register">&nbsp;&nbsp;&nbsp;
			</form>
		</div>
		<footer>
			<nav>
				<span class="navel">
					<a href="">Employment</a> |
					<a href="">TOS</a> | 
					<a href="">Support</a> | 
					<a href="">Contact Us</a> |
					<a href="">About Us</a>  
				</span>
			</nav>
		</footer>
	</body>
</html>
