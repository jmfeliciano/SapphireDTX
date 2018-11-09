<?php 
	session_start();

	// variable declaration
	$firstname = "";
	$lastname = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('127.0.0.1', 'root', '', 'inflightapp');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$firstname = mysqli_real_escape_string($db, $_POST['registerFirstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['registerLastname']);
		$email = mysqli_real_escape_string($db, $_POST['registerEmail']);
		$contact = mysqli_real_escape_string($db, $_POST['registerNumber']);
		$password_1 = mysqli_real_escape_string($db, $_POST['registerPassword']);
		$password_2 = mysqli_real_escape_string($db, $_POST['registerPassword2']);
		$ewallet = 0.00;
		$tokens = 0.00;

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		$select = mysqli_query($db, "SELECT `email` FROM `shopusers` WHERE `email` = '".$_POST['registerEmail']."'") or exit(mysqli_error($db));
			if(mysqli_num_rows($select)) {
			    array_push($errors, "The email is already being used.");
			}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO shopusers (firstname, lastname, email, contactno, ewallet, tokens, password) 
					  VALUES('$firstname', '$lastname','$email', '$contact', '$ewallet', '$tokens', '$password')";
			mysqli_query($db, $query);

			$_SESSION['name'] = $firstname;
			$_SESSION['success'] = "You are now logged in";
			header('location: home.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['loginEmail']);
		$password = mysqli_real_escape_string($db, $_POST['loginPassword']);


		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM shopusers WHERE email='$email' and password='$password'";
			$results = mysqli_query($db, $query);
			$num=mysqli_fetch_assoc($results);

			if (mysqli_num_rows($results) == 1) {
				$extra="home.php";
				$_SESSION['login']=$_POST['loginEmail'];
				$_SESSION['id']=$num['id'];
				$_SESSION['name']=$num['firstname'];
				$_SESSION['lname']=$num['lastname'];
				$_SESSION['ewallet']=$num['ewallet'];
				$_SESSION['tokens']=$num['tokens'];
				$uip=$_SERVER['REMOTE_ADDR'];
				$status=1;
				$log=mysqli_query($db,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
				$host=$_SERVER['HTTP_HOST'];
				$_SESSION['success'] = "You are now logged in";
				$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
				header("location:http://$host$uri/$extra");
				exit();
			}else {
				$email=$_POST['loginEmail'];
				$uip=$_SERVER['REMOTE_ADDR'];
				$status=0;
				$log=mysqli_query($db,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
				$host  = $_SERVER['HTTP_HOST'];
				$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
				array_push($errors, "Wrong email/password combination.");
			}
		}
	}

?>