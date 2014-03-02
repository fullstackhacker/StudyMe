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
			<form id="login" action="login.php" method="post">
				<input class="logger" type="email" placeholder="Email"  name="lemail"><br>
				<input class="logger" type="password" placeholder="Password" name="fastpass"><br>
				<input id="lsubton" type="submit" value="Log In">
			</form>
		</header>
		<div id="loginsec">
			<form id="register" action="register.php" method="post">
				<input class="formtext" placeholder="First Name" type="text" name="fname"><br>
				<input class="formtext" placeholder="Last Name" type="text" name="lname"><br>
				<input class="formtext" placeholder="Email" type="email" name="email"><br>
				<input class="formtext" placeholder="Password" type="password" name="passpass"><br>
				<input class="formtext" placeholder="Re-type Password" type="password" name="rpassword"><br>
				<select id="options"  name="type">
					<option id="ph" value="placeholder">User Type</option>
					<option value="student">Student</option>
					<option value="researcher">Researcher</option>
				</select><br>
				<input class="formbutton" type="submit" value="Register">
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
