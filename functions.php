<?php

	if(isset($_POST['signup'])) {
		include('connection.php');

		if($_POST['password'] == $_POST['confirmpw']) {

			$full_name = $_POST['full_name'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			$sql = "INSERT INTO users (full_name, email, username, password, role) VALUES ('$full_name', '$email', '$username', '$password', 'regular')";
			$result = mysqli_query($conn,$sql);

			if($result) {
				$_SESSION['message'] = "<span class='register-alert'>You have created your account!</span>";
				header('location:log_in.php');
			}
		}
	}
	
	function signUpAlert() {

		$message = "";
		if(isset($_SESSION['message'])){
			$message = $_SESSION['message'];
			unset($_SESSION['message']);
			echo $message;
		}
	}

	if(isset($_POST['login'])) {
		include('connection.php');

		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$sql = "SELECT * FROM users WHERE username = '$username'
		AND password = '$password'";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_assoc($result);
			$_SESSION['full_name'] = $full_name;
			$_SESSION['username'] = $username;
			$_SESSION['role'] = $row['role'];
			header('location:index.php');
		}
	}

?>

